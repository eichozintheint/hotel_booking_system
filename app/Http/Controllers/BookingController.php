<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{

    public function BookingCreate(){

        // $roomTypes = RoomType::all();
        // $selectedRoomType = request('roomType');
        // $rooms = $selectedRoomType ? RoomType::where('title',$selectedRoomType)->rooms()->pluck('titles') : collect();

        return view('booking');
    }

    public function store(){
        $cleanData = request()->validate([
            // 'username'=>['required'],
            // 'email'=>['required','email'],
            'check-in'=>['required'],
            'check-out'=>['required'],
            // 'adault'=>['required'],
            // 'room'=>['required'],
            'roomType'=>['required']
            // 'special_request'=>['required']
        ]);
        // Booking::create(request()->all());


            $booking = new Booking();
            $booking->check_in_date=request('check-in');
            $booking->check_out_date=request('check-out');
            $booking->room_type=request('roomType');
            $booking->room=request('room');
            // $booking->total_adault=request('adault');
            // $booking->total_child=request('child');
            $booking->customer_id=session()->pull('customerID');
            $booking->save();

            $rooms = Room::all();
            foreach($rooms as $room){
                if($room->title === $booking->room){
                    $room->available_status = 'not available';
                    $room->save();
                }
            };

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
            case '1':
                $totalPrice = $daysDifference * $superiorRoomPrice;
                break;

            case '2':
                $totalPrice = $daysDifference * $deluxeRoomPrice;
                break;

            case '3':
                $totalPrice = $daysDifference * $standardRoomPrice;
                break;


            default:
                $totalPrice = $daysDifference * $dormitoryRoomPrice;
                break;
        }

        $selectedRoomTypeID = Booking::latest()->first()->room_type;
        $selectedRoomTypeTitle = null;
        switch ($selectedRoomTypeID) {
            case '1':
                $selectedRoomTypeTitle='Superior Room';
                break;

            case '2':
                $selectedRoomTypeTitle='Deluxe Room';
                break;

            case '3':
                $selectedRoomTypeTitle='Standard Room';
                break;

            default:
                $selectedRoomTypeTitle='Dormitory Room';
                break;
        }

        return view('booking-success',[
            'details'=>Booking::latest()->first(),
            'selectedRoomTypeTitle'=>$selectedRoomTypeTitle,
            'totalPrice'=>$totalPrice,
            // 'bookingCustomer'=> Booking::latest()->first()->customer->username,
            // 'bookingEmail'=> Booking::latest()->first()->customer->email,
            'totalDays'=>$daysDifference
        ]);
    }
}



    // <?php
    //                     $roomTypetitle = $roomCheck;
    //                     $roomTypeID = null;
    //                     switch ($roomTypetitle) {
    //                         case 'Superior Room':
    //                             $roomTypeID = 1;
    //                             break;

    //                         case 'Deluxe Room':
    //                             $roomTypeID = 2;
    //                             break;

    //                         case 'Standard Room':
    //                             $roomTypeID = 3;
    //                             break;

    //                         case 'Dormitory Room':
    //                             $roomTypeID = 4;
    //                             break;

    //                     }
    //                     $associatedRooms = $rooms->where('roomtype_id',$roomTypeID);
    //                     $roomNumbers = $associatedRooms->pluck('title');
    //                 ?>
