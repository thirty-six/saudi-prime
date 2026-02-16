<?php

namespace App\Http\Controllers;

use App\Models\RamadanSession;
use App\Models\RamadanRegistration;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Mail\RamadanInvoiceMail;
use Illuminate\Support\Facades\Mail;

class RamadanRegistrationController extends Controller
{
   
public function create()
{
    $sessions = RamadanSession::where('is_active', true)
        ->withCount('registrations')
        ->get()
        ->map(function ($s) {

            $remaining = $s->capacity - $s->registrations_count;

            return [
                'id' => $s->id,
                'days' => $s->days->value,
                'days_label' => $s->days->getLabel(),
                'start_time' => $s->start_time,
                'end_time' => $s->end_time,
                'price' => $s->price,
                'remaining' => $remaining,
            ];
        })
        ->filter(fn ($s) => $s['remaining'] > 0)
        ->values();

    $days = $sessions
        ->unique('days')
        ->values()
        ->map(fn ($item) => [
            'value' => $item['days'],
            'label' => $item['days_label'],
        ]);

    return view('ramadan_register', [
        'sessions' => $sessions->toArray(),
        'days' => $days->toArray(),
    ]);
}


public function invoice($token)
{
    $registration = RamadanRegistration::where('invoice_token', $token)
        ->with('session')
        ->firstOrFail();

    return view('ramadan_invoice', compact('registration'));
}



    public function store(Request $request)
    {
    
    $request->validate([
        'guardian_name' => 'required|string|max:255',
        'guardian_phone' => [
    'required',
    'string',
    'max:20',
    'regex:/^(?:\+9665\d{8}|05\d{8})$/'
],
        'guardian_email' => 'nullable|email|max:100',
        'child_name' => 'required|string|max:255',
        'child_dob' => 'required|date',
        'age_group' => 'required|in:boys,girls',
        'ramadan_session_id' => 'required|exists:ramadan_sessions,id',
        'payment_method' => 'required',
        'media_consent' => 'required|in:agree,refuse',
        'accepted_terms' => 'required',
    ], [
    'guardian_phone.required' => 'رقم الجوال مطلوب.',
    'guardian_phone.regex' => 'يجب إدخال رقم جوال سعودي صحيح يبدأ بـ 05 أو +9665 ويتكون من 10 أرقام.',
]);

    // 🔹 تحقق العمر
    $age = Carbon::parse($request->child_dob)->age;

    if ($request->age_group === 'boys' && ($age < 5 || $age > 8)) {
        return back()->withErrors([
            'child_dob' => 'عمر الأولاد يجب أن يكون بين 5 و 8 سنوات'
        ])->withInput();
    }

    if ($request->age_group === 'girls' && ($age < 5 || $age > 15)) {
        return back()->withErrors([
            'child_dob' => 'عمر البنات يجب أن يكون بين 5 و 15 سنة'
        ])->withInput();
    }

    // 🔹 تحقق السعة
    $session = RamadanSession::findOrFail($request->ramadan_session_id);

    if ($session->registrations()->count() >= $session->capacity) {
        return back()->withErrors([
            'ramadan_session_id' => 'الفترة ممتلئة بالكامل'
        ])->withInput();
    }

     $registrationCount = RamadanRegistration::where('guardian_phone', $request->guardian_phone)->count();

    if ($registrationCount >= 3) {
        return back()
            ->withErrors([
                'guardian_phone' => 'لا يمكن التسجيل أكثر من ثلاث مرات بنفس رقم الجوال.'
            ])
            ->withInput();
    }
    $phone = $request->guardian_phone;

if (str_starts_with($phone, '05')) {
    $phone = '+966' . substr($phone, 1);
}

$request->merge([
    'guardian_phone' => $phone
]);

    $registration_insert = RamadanRegistration::create([
        'guardian_name' => $request->guardian_name,
        'guardian_phone' => $request->guardian_phone,
        'guardian_email' => $request->guardian_email,
        'child_name' => $request->child_name,
        'child_dob' => $request->child_dob,
        'age_group' => $request->age_group,
        'ramadan_session_id' => $session->id,
        'price' => $session->price,
        'payment_method' => $request->payment_method,
        'media_consent' => $request->media_consent,
        'accepted_terms' => true,
    ]);

    do {
        $token = Str::uuid()->toString();
    } while (
        RamadanRegistration::where('invoice_token', $token)->exists()
    );
    $datePart = now()->format('Ymd');
    $sequence = str_pad($registration_insert->id, 5, '0', STR_PAD_LEFT);

    $receiptNumber = "RC-{$datePart}-{$sequence}";

    $registration_insert->update([
        'invoice_token' => $token,
        'receipt_number' => $receiptNumber
    ]);

    if ($registration_insert->guardian_email) {
    Mail::to($registration_insert->guardian_email)
        ->send(new RamadanInvoiceMail($registration_insert));
}

     $invoiceUrl = route('ramadan_invoice', $token);

        $message  = "تم تسجيل طفلكم بنجاح 🎉\n\n";
        $message .= "اسم الطفل: {$request->child_name}\n";
        $message .= "اليوم: {$session->days->getLabel()}\n";
        $message .= "الوقت: {$session->start_time} - {$session->end_time}\n";
        $message .= "السعر: {$session->price} ريال\n";
        $message .= "رقم الإيصال: {$receiptNumber}\n\n";
        $message .= "رابط الفاتورة:\n{$invoiceUrl}";

        $this->sendWhatsAppMessage($request->guardian_phone, $message);

        return redirect()->route('ramadan_invoice', $token);
    // return redirect()
    //     ->route('ramadan_register')
    //     ->with('success', 'تم تسجيل الطفل بنجاح');
}

private function sendWhatsAppMessage($phone, $message)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (!str_starts_with($phone, '966')) {
            $phone = '966' . ltrim($phone, '0');
        }

        Http::withToken(config('services.whatsapp.token'))
            ->post("https://graph.facebook.com/" . config('services.whatsapp.version') . "/" . config('services.whatsapp.phone_id') . "/messages", [
                "messaging_product" => "whatsapp",
                "to" => $phone,
                "type" => "text",
                "text" => [
                    "body" => $message
                ]
            ]);
    }
}