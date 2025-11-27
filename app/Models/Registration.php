<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }

}
