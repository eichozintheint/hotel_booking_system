<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function roomtype(){  // roomtype_id
        return $this->belongsTo(RoomType::class,'roomtype_id');
    }
}

// rooms roomtypes

// a room belongsTo a roomtype
// a roomtype hasMany rooms

// rooms table = roomtype_id
// roomtype table =
