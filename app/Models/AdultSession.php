<?php

namespace App\Models;

use App\Enums\DaysEnum;
use App\Enums\RegistrationStatusEnum;
use App\Enums\SessionStatusEnum;
use App\Models\MorningRegistration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdultSession extends Model
{
    use SoftDeletes;

    protected static function booted()
    {
        static::updating(function (AdultSession $session) {

            if (
                $session->isDirty('status') &&
                $session->status === SessionStatusEnum::Started
            ) {
                $session
                    ->registrations()
                    ->where('registrations.status', RegistrationStatusEnum::Pending)
                    ->update([
                        'status' => RegistrationStatusEnum::Started,
                    ]);
            }
        });
    }

    protected $fillable = [
        'program_sport_id',
        'day',
        'status',
        'start_time',
        'start_at',
        'capacity',
    ];
    protected $appends = [
        'registrations_count',
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
    // Other getters
    public function getRegistrationsCountAttribute()
    {
        return $this->registrations()
        // just to be sure its won't count cancelled registrations (we detach them on cancel)
            ->whereNot('registrations.status', RegistrationStatusEnum::Cancelled->value)
            ->count();
    }
    public function isFull(): bool
    {
        return $this->registrationsCount() >= $this->capacity;
    }

    public function morningRegistrations()
    {
        return MorningRegistration::where(function ($query) {
            $query->where('program_sport_id_1', $this->program_sport_id)
                  ->orWhere('program_sport_id_2', $this->program_sport_id);
        });
    }

    public function getMorningRegistrationsCountAttribute()
    {
        return $this->morningRegistrations()->count();
    }

    public function isMorningFull(): bool
    {
        return $this->morningRegistrations()->count() >= $this->capacity;
    }
}
