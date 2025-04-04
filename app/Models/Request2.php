<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'problem',
        'repair_date',
        'car_id', 
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car() 
    {
        return $this->belongsTo(Car::class, 'car_id'); 
    }      
    
}
