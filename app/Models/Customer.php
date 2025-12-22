<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 
        'phone', 
        'university_id',
    ];

    // Relationships
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    public function kids()
    {
        return $this->hasMany(Kid::class, 'guardian_id');
    }
}
