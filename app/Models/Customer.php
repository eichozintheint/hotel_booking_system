<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password'
    ];

    // customers bookings

    // a customer has one booking
    // a booking has one customer

    // customer table =>
    // booking table => customer_id

    // public function booking(){  // customer_id
    //     return $this->hasOne(Booking::class);
    // }
}
