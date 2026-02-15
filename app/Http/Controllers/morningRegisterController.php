<?php

namespace App\Http\Controllers;

use App\Models\MorningRegistration;
use App\Models\Program;
use App\Models\ProgramSport;
use App\Models\AdultSession;
use Illuminate\Http\Request;

class MorningRegisterController extends Controller
{
    public function index()
    {
        $program = Program::where('category', 'morning')->firstOrFail();

        $programSports = ProgramSport::with('sport')
            ->where('program_id', $program->id)
            ->where('is_visible', 1)
            ->where('status', 'open')
            ->get();

        return view('morning_register', [
            'program' => $program,
            'programSports' => $programSports,
            'price' => $program->base_price,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'         => ['required', 'string', 'max:255'],
            'university_number' => ['required', 'regex:/^\d{8,10}$/'],
            'phone'             => ['required', 'regex:/^\+9665\d{8}$/'],
            'email'             => ['nullable', 'email', 'max:100'],

            'day_one'           => ['required', 'in:saturday,sunday,monday,tuesday,wednesday,thursday'],
            'day_two'           => ['required','different:day_one','in:saturday,sunday,monday,tuesday,wednesday,thursday'],

            'start_time_1'      => ['required'],
            'start_time_2'      => ['required'],

            'payment_method'    => ['required', 'in:cash,bank_transfer'],
            'payment_proof'     => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'accepted_terms'    => ['accepted'],
        ]);

        /*
        =========================================================
        البحث عن الحصة الأولى
        =========================================================
        */

        $session1 = AdultSession::where('day', $validated['day_one'])
            ->where('start_time', $validated['start_time_1'])
            ->first();

        if ($session1->isMorningFull()) {
            return back()->withErrors([
                'start_time_1' => 'الحصة الأولى ممتلئة بالكامل.'
            ])->withInput();
        }

        if ($session1->morningRegistrations()->count() >= $session1->capacity) {
            return back()->withErrors([
                'start_time_1' => 'الحصة الأولى ممتلئة بالكامل.'
            ])->withInput();
        }

        /*
        =========================================================
        البحث عن الحصة الثانية
        =========================================================
        */

        $session2 = AdultSession::where('day', $validated['day_two'])
            ->where('start_time', $validated['start_time_2'])
            ->first();

        if (! $session2) {
            return back()->withErrors([
                'start_time_2' => 'الحصة الثانية غير متاحة.'
            ])->withInput();
        }

        if ($session2->isMorningFull()) {
            return back()->withErrors([
                'start_time_2' => 'الحصة الثانية ممتلئة بالكامل.'
            ])->withInput();
        }

        /*
        =========================================================
        منع تكرار نفس الطالبة في نفس الحصتين
        =========================================================
        */

        $exists = MorningRegistration::where(function ($q) use ($session1, $session2) {
                $q->where('program_sport_id_1', $session1->program_sport_id)
                  ->orWhere('program_sport_id_2', $session2->program_sport_id);
            })
            ->where(function ($q) use ($validated) {
                $q->where('university_number', $validated['university_number'])
                  ->orWhere('phone', $validated['phone']);
            })
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'university_number' => 'تم التسجيل مسبقاً لهذه الحصص.'
            ])->withInput();
        }

        /*
        =========================================================
        رفع إثبات الدفع
        =========================================================
        */

        $path = null;
        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payments', 'public');
        }

        /*
        =========================================================
        إنشاء التسجيل
        =========================================================
        */

        MorningRegistration::create([
            'full_name'         => $validated['full_name'],
            'university_number' => $validated['university_number'],
            'phone'             => $validated['phone'],
            'email'             => $validated['email'],

            'program_sport_id_1'=> $session1->program_sport_id,
            'program_sport_id_2'=> $session2->program_sport_id,

            'day_one'           => $validated['day_one'],
            'day_two'           => $validated['day_two'],

            'start_time_1'      => $validated['start_time_1'],
            'start_time_2'      => $validated['start_time_2'],

            'start_at'          => $session1->start_at,

            'payment_method'    => $validated['payment_method'],
            'payment_proof'     => $path,
            'price'             => $session1->programSport->program->base_price,
            'is_paid'           => false,
        ]);

        return back()->with('success', 'تم التسجيل بنجاح');
    }
}
