<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RamadanRegistration extends Model
{
    protected $fillable = [
        'guardian_name',
        'guardian_phone',
        'guardian_email',
        'child_name',
        'child_dob',
        'age_group',
        'ramadan_session_id',
        'price',
        'paid',
        'payment_method',
        'invoice_token',
        'media_consent',
        'accepted_terms',
    ];

    protected $casts = [
    'paid' => 'boolean',
];

    public function session()
{
    return $this->belongsTo(RamadanSession::class, 'ramadan_session_id');
}
}
