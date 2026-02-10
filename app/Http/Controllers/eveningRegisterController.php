<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class eveningRegisterController extends Controller
{
    public function index()
    {
        return view('evening_register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'      => ['required', 'string', 'max:255'],
            'phone'          => ['required', 'regex:/^\+9665\d{8}$/'],
            'email'          => ['nullable', 'email' , 'max:100'],
            'program'        => ['required'],
            'day_one'        => ['required'],
            'day_two'        => ['required', 'different:day_one'],
            'time_slot'      => ['required'],
            'payment_method' => ['required'],
            'payment_proof'  => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'accepted_terms' => ['accepted'],
        ]);

        $validated['payment_proof'] =
            $request->file('payment_proof')->store('payment-proofs', 'public');

        // مثال حفظ لاحقاً
        // MorningRegistration::create($validated);

        return redirect()
            ->route('morning.register')
            ->with('success', 'تم إرسال التسجيل بنجاح');
    }

}
