<?php

namespace App\Models;

use App\Enums\SessionStatusEnum;
use Illuminate\Database\Eloquent\Model;

class KidSession extends Model
{
    protected $fillable = [
        'sport_id',
        'days',
        'status',
        'start_time',
        'start_at',
        'capacity',
    ];

    protected function casts()
    {
        return [
            'status' => SessionStatusEnum::class,
        ];
    }

    // Relations
    public function Sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
