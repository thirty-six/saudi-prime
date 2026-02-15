<?php

namespace App\Models;

use App\Enums\SessionDaysEnum;
use App\Enums\SessionStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KidSession extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sport_id',
        'days',
        'status',
        'start_time',
        'start_at',
        'base_price',
        'capacity',
    ];

    protected function casts()
    {
        return [
            'days' => SessionDaysEnum::class,
            'status' => SessionStatusEnum::class,
            'start_time' => 'datetime:H:i',
            'start_at' => 'datetime:Y-m-d',
        ];
    }

    // Relations
    public function Sport()
    {
        return $this->belongsTo(Sport::class);
    }

   public function registrations()
    {
        return $this->hasMany(KidRegistration::class);
    }

    // 🔥 Smart remaining seats
    public function getRemainingSeatsAttribute(): int
    {
        return $this->capacity - $this->registrations()->count();
    }

    public function getIsFullAttribute(): bool
    {
        return $this->remaining_seats <= 0;
    }
}
