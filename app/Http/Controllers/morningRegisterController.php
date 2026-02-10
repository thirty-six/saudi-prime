<?php

namespace App\Http\Controllers;

use App\Models\MorningRegistration;
use App\Models\Program;
use App\Models\ProgramSport;
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
            'full_name'           => ['required', 'string', 'max:255'],
            'university_number'   => ['required', 'regex:/^\d{8,10}$/'],
            'phone'               => ['required', 'regex:/^\+9665\d{8}$/'],
            'email'               => ['nullable', 'email', 'max:100'],

            'program_sport_id'    => ['required', 'exists:program_sports,id'],
            'day_one'             => ['required', 'in:saturday,sunday,monday,tuesday,wednesday,thursday'],
            'day_two'             => [
                'required',
                'in:saturday,sunday,monday,tuesday,wednesday,thursday',
                'different:day_one'
            ],
            'start_time'          => ['required'],

            'payment_method'      => ['required', 'in:cash,bank_transfer'],
            'payment_proof'       => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'accepted_terms'      => ['accepted'],
        ]);

        // تأكيد أن التسجيل Morning فقط
        $programSport = ProgramSport::whereHas('program', function ($q) {
                $q->where('category', 'morning');
            })
            ->where('id', $validated['program_sport_id'])
            ->firstOrFail();

        $path = null;

        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payments', 'public');
        }

    $session = $programSport->adultSessions()
    ->where('day', $validated['day_one'])
    ->where('start_time', $validated['start_time'])
    ->first();

        if (! $session) {
            return back()->withErrors([
                'start_time' => 'الحصة المختارة غير متاحة.'
            ]);
        }

        $registrationsCount = $session->morning_registrations()->count();

        if ($registrationsCount >= $session->capacity) {
            return back()->withErrors([
                'start_time' => 'عذراً، هذه الحصة ممتلئة بالكامل.'
            ]);
        }

        MorningRegistration::create([
            'full_name'          => $validated['full_name'],
            'university_number'  => $validated['university_number'],
            'phone'              => $validated['phone'],
            'email'              => $validated['email'],
            'program_sport_id'   => $programSport->id,
            'day_one'            => $validated['day_one'],
            'day_two'            => $validated['day_two'],
            'start_time'         => $validated['start_time'],
            'start_at'          => $session?->start_at, 
            'payment_method'     => $validated['payment_method'],
            'payment_proof'      => $path,
            'price'              => $programSport->program->base_price,
            'is_paid'            => in_array($validated['payment_method'], ['online', 'bank_transfer']),
        ]);

        return back()->with('success', 'تم التسجيل بنجاح');
    }
}
