<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id', 
        'guest_id',
        'order_id',
        'pickup_driver',
        'proof_pickup',
        'delivery_date',
        'deliver_driver',
        'proof_deliver',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
