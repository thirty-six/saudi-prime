<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\SessionStatusEnum;
use App\Enums\DaysEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramSport extends Model
{ 
    use SoftDeletes;
    protected $table = 'program_sports';
    protected $fillable = [
        'program_id',
        'sport_id',
        'is_visible',
        'day',
        'start_time',
        'status',
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

    protected function casts()
    {
        return[
            'start_time' => 'datetime:H:i',
            'status' => SessionStatusEnum::class,
            'day' => DaysEnum::class,
        ];
    }

    public function adultSessions()
    {
        return $this->hasMany(
            AdultSession::class,
            'program_sport_id'
        );
    }
}
