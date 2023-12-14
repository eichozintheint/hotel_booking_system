<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password'
    ];



    public function bookings(){  // customer_id
        return $this->hasMany(Booking::class,'customer_id');
    }
}

 // customers bookings

    // a customer has one booking
    // a booking has one customer

    // customer table =>
    // booking table => customer_id
