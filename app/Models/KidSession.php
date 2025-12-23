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
}
