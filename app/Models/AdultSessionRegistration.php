<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdultSessionRegistration extends Model
{
    protected $fillable = [
        'adult_session_id',
        'registration_id',
        'attendance_date',
    ];

    protected function casts()
    {
        return [
            'attendance_date' => 'array',
        ];
    }

    // Relations
    public function adultSession()
    {
        return $this->belongsTo(AdultSession::class);
    }
    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
