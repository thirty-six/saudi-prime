<?php

namespace App\Models;

use App\Enums\ProgramCategoryEnum;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'category',
        'description_ar',
        'features',
        'base_price',
    ];

    protected function casts()
    {
        return [
            'category' => ProgramCategoryEnum::class,
            'features' => 'array',
        ];
    }

    // Relation
    public function sessions()
    {
        return $this->hasMany(AdultSession::class);
    }

    // Localized attributes
    public function getDescriptionAttribute(): string
    {
        return $this->{'description_' . app()->getLocale()};
    }
}

