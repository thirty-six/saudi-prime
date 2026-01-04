<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramSport extends Model
{
    protected $fillable = [
        'program_id',
        'sport_id',
        'is_visible',
    ];
    protected $with = [
        'sport',
        'program',
    ];

    // Relations
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
    public function sessions()
    {
        return $this->hasMany(AdultSession::class);
    }
}
