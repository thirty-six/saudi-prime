<?php

namespace App\Models;

use App\Enums\DaysEnum;
use App\Enums\SessionStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdultSession extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'program_id',
        'sport_id',
        'day',
        'status',
        'start_time',
        'start_at',
        'capacity',
    ];
    
    protected function casts()
    {
        return[
            'start_time' => 'datetime:H:i',
            'start_at' => 'datetime:Y-m-d',
            'status' => SessionStatusEnum::class,
            'day' => DaysEnum::class,
        ];
    }

    // Relations
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function Sport()
    {
        return $this->belongsTo(Sport::class);
    }
    public function registrations()
    {
        return $this->hasManyThrough(
            Registration::class,
            AdultSessionRegistration::class,
            'adult_session_id', // FK on intermediate table
            'id',               // FK on registrations table
            'id',               // local key on adult_sessions
            'registration_id'   // local key on adult_session_registrations
        );
    }
    public function registrationSessions()
    {
        return $this->hasMany(AdultSessionRegistration::class);
    }

}
