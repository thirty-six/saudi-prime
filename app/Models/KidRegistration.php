<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KidRegistration extends Model
{

    protected $table = 'kids_registrations';
    protected $fillable = [
        'sport_id', 'kid_session_id', 'guardian_name', 'guardian_phone', 'guardian_email',
        'child_name', 'child_dob', 'age_group', 'subscription_type', 'payment_method',
        'payment_proof', 'guardian_approval', 'start_time', 'start_at', 'accepted_terms'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

   public function session()
    {
        return $this->belongsTo(KidSession::class, 'kid_session_id');
    }

    protected static function booted()
{
    static::created(function ($registration) {
        $registration->session->save(); // trigger lifecycle
    });

    static::deleted(function ($registration) {
        $registration->session->save(); // reopen if seats available
    });
}
}
