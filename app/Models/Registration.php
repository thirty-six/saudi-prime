<?php

namespace App\Models;

use App\Enums\RegistrationStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected static function booted()
    {
        // Case: deleted
        static::deleting(function ($registration) {
            $registration->sessions()->detach();
        });
    }
        
    protected $fillable = [
        'customer_id',
        'status',
        'accepted_terms',
        'price',
        'paid_at',
    ];
    protected $appends = [
        'is_paid',
    ];
    protected function casts()
    {
        return [
            'status' => RegistrationStatusEnum::class,
            'paid_at' => 'datetime',
        ];
    }
    
    // Relations
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function registrationSessions()
    {
        return $this->hasMany(AdultSessionRegistration::class);
    }
    public function sessions()
    {
        return $this->belongsToMany(
            AdultSession::class,
            'adult_session_registrations'
        )
        ->withPivot(['attendance_date'])
        ->withTimestamps();
    }

    // Sync sessions
    public function syncSessions(array $sessionIds)
    {
        if (empty($sessionIds) || $this->status === RegistrationStatusEnum::Cancelled) {
            $this->sessions()->detach();
            return;
        }
        $this->sessions()->sync($sessionIds);
    }
    
    // other getter
    public function getIsPaidAttribute()
    {
        return !empty($this->paid_at);
    }
}
