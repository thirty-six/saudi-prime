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

    // Relations
    public function details()
    {
        return $this->hasMany(SportDetails::class);
    }
    public function adultSessions()
    {
        return $this->hasMany(AdultSession::class);
    }
    public function kidSessions()
    {
        return $this->hasMany(KidSession::class);
    }

    // Localized attributes
    public function getDescriptionAttribute(): string
    {
        return $this->{'description_' . app()->getLocale()};
    }
}
