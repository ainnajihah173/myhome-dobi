<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'gender',
        'role',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
