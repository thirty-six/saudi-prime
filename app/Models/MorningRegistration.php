<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MorningRegistration extends Model
{
    protected $table = 'morning_registration_st';
    protected $fillable = [
        'full_name',
        'university_number',
        'phone',
        'email',
        'program_sport_id_1',
        'program_sport_id_2',
        'day_one',
        'day_two',
        'start_time_1',
        'start_time_2',
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
public function sessionOne()
    {
        return $this->belongsTo(
            ProgramSport::class,
            'program_sport_id_1'
        );
    }

    public function sessionTwo()
    {
        return $this->belongsTo(
            ProgramSport::class,
            'program_sport_id_2'
        );
    }

    public function programSport1()
{
    return $this->belongsTo(ProgramSport::class, 'program_sport_id_1');
}

public function programSport2()
{
    return $this->belongsTo(ProgramSport::class, 'program_sport_id_2');
}

}
