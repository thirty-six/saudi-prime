<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\KidSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Enums\SessionStatusEnum;
use App\Models\KidRegistration;

class KidsRegisterController extends Controller
{
    public function index()
{
    $sports = Sport::whereHas('kidSessions', function ($q) {
            $q->where('status', \App\Enums\SessionStatusEnum::Open);
        })
        ->with([
            'kidSessions' => function ($q) {
                $q->where('status', \App\Enums\SessionStatusEnum::Open)
                  ->withCount('registrations');
            }
        ])
        ->get();

    return view('kids_register', compact('sports'));
}


    public function store(Request $request)
    {
        $request->validate([
            'guardian_name'     => 'required|string|max:255',
            'guardian_phone'    => 'required|string|regex:/^\+9665\d{8}$/',
            'guardian_email'    => 'nullable|email|max:100',
            'child_name'        => 'required|string|max:255',
            'child_dob'         => 'required|date',
            'age_group'         => 'required',
            'sport_id'          => 'required|exists:sports,id',
            'kid_session_id'    => 'required|exists:kid_sessions,id',
            'subscription_type' => 'required',
            'payment_method'    => 'required',
            'accepted_terms'    => 'required|accepted',
        ]);

        DB::transaction(function() use ($request) {

            $session = KidSession::lockForUpdate()
                ->where('id', $request->kid_session_id)
                ->where('status', SessionStatusEnum::Open)
                ->firstOrFail();

            if ($session->remaining_seats <= 0) {
                abort(422,'الجلسة ممتلئة');
            }

            KidRegistration::create([
                'guardian_name'     => $request->guardian_name,
                'guardian_phone'    => $request->guardian_phone,
                'guardian_email'    => $request->guardian_email,
                'child_name'        => $request->child_name,
                'child_dob'         => $request->child_dob,
                'age_group'         => $request->age_group,
                'sport_id'          => $request->sport_id,
                'kid_session_id'    => $request->kid_session_id,
                'subscription_type' => $request->subscription_type,
                'payment_method'    => $request->payment_method,
                'start_time'        => $session->start_time,
                'start_at'          => $session->start_at,
                'accepted_terms'    => true,
            ]);

            // trigger lifecycle
            $session->save();
        });

        return back()->with('success','تم تسجيل الطفل بنجاح');
    }
}
