<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sport extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name_ar',
        'description_ar',
        'icon',
    ];
    protected $appends = [
        'name',
        'description',
    ];

    // Relations
    public function details()
    {
        return $this->hasMany(SportDetails::class);
    }
    public function programSports()
    {
        return $this->hasMany(ProgramSport::class);
    }
    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_sports');
    }
    public function adultSessions()
    {
        return $this->hasManyThrough(
            AdultSession::class,
            ProgramSport::class,
            'sport_id',
            'id',
            'adult_session_id',
            'id',
        );
    }
    public function kidSessions()
    {
        return $this->hasMany(KidSession::class);
    }

    // Localized attributes
    public function getNameAttribute(): string
    {
        return $this->{'name_' . app()->getLocale()} ?? null;
    }
    public function getDescriptionAttribute(): string
    {
        return $this->{'description_' . app()->getLocale()} ?? null;
    }
}
