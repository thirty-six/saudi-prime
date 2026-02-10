<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use App\Enums\SessionStatusEnum;

class kidsRegisterController extends Controller
{
    public function index()
    {
        return view('kids_register', [
            'sports'   => Sport::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'guardian_name'        => 'required|string|max:255',
            'guardian_phone'       => 'required|string|regex:/^\+9665\d{8}$/',
            'guardian_email'       => 'nullable|email|max:100',
            'child_name'           => 'required|string|max:255',
            'child_dob'            => 'required|date',
            'age_group'            => 'required',
            'program'              => 'required',
            'group_type'           => 'required',
            'session_time'         => 'required',
            'subscription_type'    => 'required',
            'payment_method'       => 'required',
            'payment_proof'        => 'nullable|file|mimes:jpg,png,pdf',
            'guardian_approval'    => 'required|file|mimes:jpg,png,pdf',
            'accepted_terms'       => 'required',
        ]);

        return back()->with('success', 'تم تسجيل الطفل بنجاح');
    }
}
