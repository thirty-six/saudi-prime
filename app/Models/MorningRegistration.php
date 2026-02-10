<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MorningRegistration extends Model
{
    protected $table = 'morning_register_students';
    protected $fillable = [
        'full_name',
        'university_number',
        'phone',
        'email',
        'program_sport_id',
        'day_one',
        'day_two',
        'start_time',
        'start_at',
        'payment_method',
        'payment_proof',
        'price',
        'is_paid',
    ];

    public function programSport()
    {
        return $this->belongsTo(ProgramSport::class);
    }
    public function session()
{
    return $this->belongsTo(AdultSession::class, 'program_sport_id', 'program_sport_id');
}
}
