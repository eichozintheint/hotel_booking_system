<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(){
        return view('booking',[
            'roomTypes'=>RoomType::all(),
            'rooms'=>Room::all()
        ]);
    }

    public function store(){
        // $cleanData = request()->validate([
        //     'username'=>['required'],
        //     'email'=>['required','email'],
        //     'check-in'=>['required'],
        //     'check-out'=>['required'],
        //     'adault'=>['required'],
        //     'no_of_rooms'=>['required'],
        //     // 'roomtype'=>['required'],
        //     'special_request'=>['required']
        // ]);

        // Booking::create(request()->all());
        $booking = new Booking();
        $booking->check_in_date=request('check-in');
        $booking->check_out_date=request('check-out');
        $booking->room_type=request('room-type');
        $booking->save();
    }
}



