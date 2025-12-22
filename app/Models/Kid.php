<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'relation',
        'guardian_id',
    ];

    // Relations
    public function guardian()
    {
        return $this->belongsTo(Customer::class);
    }
}
