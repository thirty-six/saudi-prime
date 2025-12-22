<?php

namespace App\Models;

use App\Enums\SportDetailEnum;
use Illuminate\Database\Eloquent\Model;

class SportDetails extends Model
{
    protected $fillable = [
        'sport_id',
        'value_ar',
        'type',
    ];

    // Define the localizable attributes
    protected $localizable = [
        'value',
    ];
    protected function casts()
    {
        return [
            'type' => SportDetailEnum::class,
        ];
    }

    // Relations
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }


    // Localized attributes
    public function getValueAttribute(): string
    {
        return $this->{'value_' . app()->getLocale()};
    }
}
