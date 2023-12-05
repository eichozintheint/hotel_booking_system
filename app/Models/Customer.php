<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password'
    ];



    public function booking(){  // customer_id
        return $this->hasOne(Booking::class,'customer_id');
    }
}

 // customers bookings

    // a customer has one booking
    // a booking has one customer

    // customer table =>
    // booking table => customer_id
