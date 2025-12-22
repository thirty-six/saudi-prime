<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'customer_id',
        'status',
        'is_paid',
        'total_amount',
    ];
    
    // Relations
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    // public function payments()
    // {
    //     return $this->morphMany(Payment::class, 'payable');
    // }
}
