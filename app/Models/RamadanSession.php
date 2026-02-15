<?php

namespace App\Models;
use App\Enums\DaysRamadanEnum;
use App\Models\RamadanRegistration;

use Illuminate\Database\Eloquent\Model;

class RamadanSession extends Model
{
     protected $fillable = [
        'name',
        'days',
        'start_time',
        'end_time',
        'capacity',
        'price',
        'is_active'
    ];

    protected $casts = [
        'days' => DaysRamadanEnum::class,
    ];

    public function registrations()
    {
       return $this->hasMany(RamadanRegistration::class);
    }

    // public function remainingSeats()
    // {
    //     return $this->capacity - $this->registrations()->count();
    // }
}
