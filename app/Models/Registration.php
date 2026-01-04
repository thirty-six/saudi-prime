<?php

namespace App\Models;

use App\Enums\RegistrationStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'customer_id',
        'status',
        'accepted_term',
        'price',
        'paid_at',
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
    public function registrationsCount(): int
    {
        return $this->registrations()
            ->where('registrations.status', RegistrationStatusEnum::Pending->value)
            ->count();
    }
    public function isFull(): bool
    {
        return $this->registrationsCount() >= $this->capacity;
    }
    // other getter
    public function getIsPaidAttribute()
    {
        return !empty($this->paid_at);
    }
}
