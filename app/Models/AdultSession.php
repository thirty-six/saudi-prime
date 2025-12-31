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
        'program_sport_id',
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
        return $this->hasOneThrough(
            Program::class,
            ProgramSport::class,
            'id',
            'id',
            'program_sport_id',
            'program_id'
        );
    }
    public function sport()
    {
        return $this->hasOneThrough(
            Sport::class,
            ProgramSport::class,
            'id',
            'id',
            'program_sport_id',
            'sport_id'
        );
    }
    public function programSport()
    {
        return $this->belongsTo(ProgramSport::class);
    }
    public function registrations()
    {
        return $this->belongsToMany(
            Registration::class,
            'adult_session_registrations'
        )->withTimestamps();
    }
    public function registrationSessions()
    {
        return $this->hasMany(AdultSessionRegistration::class);
    }

}
