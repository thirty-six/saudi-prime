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
    protected $appends = [
        'description',
        'price',
    ];

    protected function casts()
    {
        return [
            'category' => ProgramCategoryEnum::class,
            'features' => 'array',
        ];
    }

    // Relations
    public function programSports()
    {
        return $this->hasMany(ProgramSport::class);
    }
    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'program_sports');
    }
    public function adultSessions()
    {
        return $this->hasManyThrough(
            AdultSession::class,
            ProgramSport::class,
            'program_id',          // program_sports.program_id
            'program_sport_id',    // adult_sessions.program_sport_id
            'id',
            'id',
        );
    }
    // Localized attributes
    public function getDescriptionAttribute(): string
    {
        return $this->{'description_' . app()->getLocale()} ?? null;
    }

    public function getPriceAttribute(): string
    {
        $taxRate =  config('app.vat_percentage')/100;
        return (int) round($this->{'base_price'} * (1 + $taxRate));
    }

    // public function sports()
    // {
    //     return $this->belongsToMany(Sport::class, 'program_sports')
    //         ->withPivot(['day','start_time','status','is_visible']);
    // }
}

