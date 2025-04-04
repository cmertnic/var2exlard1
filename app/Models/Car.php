<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'make',
        'model',
        'user_id',
    ];

    public function reports()
    {
        return $this->hasMany(Request2::class, 'car_id'); 
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
