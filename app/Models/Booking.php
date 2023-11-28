<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable =[
        'check_in_date',
        'check_out_date',
        'room_type',
        'room',
        'total_adault',
        'total_child'
    ];
}
