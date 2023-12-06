<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{

    public function BookingCreate(){
        return view('booking',[
            'roomTypes'=>RoomType::all(),
            'rooms'=>Room::all(),
            'booking' => Booking::all()
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
            $booking->room_type=request('roomType');
            $booking->room=request('room');
            $booking->total_adault=request('adault');
            $booking->total_child=request('child');
            $booking->customer_id=session()->pull('customerID');
            $booking->save();

            return redirect('/booking-success');
        }



    public static function show(){
        $superiorRoomPrice = 120000;
        $deluxeRoomPrice = 100000;
        $standardRoomPrice = 80000;
        $dormitoryRoomPrice = 60000;

        // Booking::latest()->first()->room_type
        // Booking::latest()->first()->check_in_date
        // Booking::latest()->first()->check_out_date
        // $total_booking_day = check_out_date - check_in_date

        // for $totalPrice
        // superiorRoom => 120000 * $total_booking_day
        // deluxeRoom => 100000 * $total_booking_day
        // standardRoom => 80000 * $total_booking_day
        // dormitoryRoom => 60000 * $total_booking_day

        $bookingData = Booking::latest()->first();
        $check_in_date = Carbon::parse($bookingData->check_in_date);
        $check_out_date = Carbon::parse($bookingData->check_out_date);
        $dateDifference = $check_in_date->diff($check_out_date);
        $daysDifference = $dateDifference->days;

        $bookingRoomType = Booking::latest()->first()->room_type;
        switch ($bookingRoomType) {
            case 'Superior Room':
                $totalPrice = $daysDifference * $superiorRoomPrice;
                break;

            case 'Duluxe Room':
                $totalPrice = $daysDifference * $deluxeRoomPrice;
                break;

            case 'Standard Room':
                $totalPrice = $daysDifference * $standardRoomPrice;
                break;


            default:
                $totalPrice = $daysDifference * $dormitoryRoomPrice;
                break;
        }

        return view('booking-success',[
            'details'=>Booking::latest()->first(),
            'totalPrice'=>$totalPrice,
            'bookingCustomer'=> Booking::latest()->first()->customer->username,
            'bookingEmail'=> Booking::latest()->first()->customer->email,
            'totalDays'=>$daysDifference
        ]);
    }
}



