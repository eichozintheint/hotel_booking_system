<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
    public function getDataForAdminDashboard(){
        // ******Dashboard***
        $bookingsCount = Booking::all()->count();
        $scheduleBookings = Booking::where('status','pending')->count();
        $acceptedBookings = Booking::where('status','accepted')->count();
        $availableRooms = Room::all()->count() - Booking::all()->count();

        $now = Date::now();
        $todayDate = $now->toDateString();
        $checkinNumber = Booking::where('check_in_date',$todayDate)->count();
        $checkoutNumber = Booking::where('check_out_date',$todayDate)->count();

        // *********Customer*******
        $getAllCustomer = Customer::all();

        // *********Room Type********
        $roomtypes = RoomType::all();

        // ***********Room*********
        $rooms = Room::all();

        // ********Bookings********
        $bookings = Booking::all();

        // $booking->customer_id

        // Booking::find(2)->customer->username

        // Customer::find($booking->customer_id)->username


        foreach($bookings as $booking){
            $customer_id=$booking->customer_id;
            $customerNames[] = Customer::where('id',$customer_id)->value('username');
            $customerEmails[] = Customer::where('id',$customer_id)->value('email');
        }

        $ableToBookRoomNumbers = Room::where('available_status','available')->get();


        return view('dashboard',[
            'bookingsCount'=>$bookingsCount,
            'scheduleBookings'=>$scheduleBookings,
            'acceptedBookings'=>$acceptedBookings,
            'availableRooms'=>$availableRooms,
            'checkinNumber'=>$checkinNumber,
            'checkoutNumber'=>$checkoutNumber,
            'customers'=>$getAllCustomer,
            'roomtypes'=>$roomtypes,
            'rooms'=>$rooms,
            'bookings'=>$bookings,
            'customerNames'=>$customerNames,
            'customerEmails'=>$customerEmails,
            'ableToBookNumbers'=>$ableToBookRoomNumbers
        ]);
    }

    public function getCustomerName($id){
        return Booking::find($id)->customer->username;
    }

    public function destroyCustomer($id){
        Customer::find($id)->delete();
        return redirect()->back()->with('success','Customer has been deleted successfully');
    }

    public function createroomtype(){
        return view('create-roomtype');
    }

    public function storeroomtype(){
        $title=request('new-roomtype-title');
        $detail=request('roomtype-detail');
        $roomtypeCount = RoomType::all()->count();
        // dd($roomtypeCount);

        // RoomType::create(request()->all());
        if($title){
            $roomtype = new RoomType;
            $roomtype->title= $title;
            $roomtype->detail= $detail;
            $roomtype->save();
        }
        return redirect('/dashboard');
    }

    public function destroyRoomtype($id){
        RoomType::find($id)->delete();
        return redirect('/dashboard')->with('success','Room Type deleted successfully');
    }

    public function createroom(){
        return view('create-room');
    }

    public function storeroom(){
        $roomNumber=request('new-room-title');
        $roomtype_id=request('room-type-id');

        if($roomNumber && $roomtype_id){
            $room = new Room;
            $room->title=$roomNumber;
            $room->roomtype_id=$roomtype_id;
            $room->save();
        }
        return redirect('/dashboard')->with('success','New Room created successfully');
    }

    public function destroyRoom($id){
        Room::find($id)->delete();
        return redirect('/dashboard')->with('success','Room deleted successfully');
    }

    public function createRoomUpdate($id){
        return view('update-room',[
            'room'=>Room::find($id)
        ]);
    }

    public function storeUpdateRoomAvailability($id){
        $roomNumber = Room::find($id);
        $roomNumber->title=request('new-room-title');
        $roomNumber->roomtype_id=request('room-type-id');
        $roomNumber->available_status=request('available-status');
        $roomNumber->save();
        // $roomNumber->update(request()->all());
        return redirect('/dashboard')->with('room-success','Room availability updated successfully');
    }

    public function destroyBooking($id){
        Booking::find($id)->delete();
        return redirect()->back()->with('success','Booking has been deleted successfully');
    }

    public function createUpdatedBooking(){

        $available_rooms = Room::where('available_status','available')->get();
        $statusOfBookings = Booking::all();

        return view('create-updateBooking',[
            'available_rooms'=>$available_rooms,
            'statusOfBookings'=>$statusOfBookings
        ]);
    }

    public function storeUpdatedBooking($id){
        $booking = Booking::find($id);
        $booking->room = request('update_room_number');
        $booking->room_type = request('update_room_type');
        $booking->check_in_date = request('check_in_date');
        $booking->check_out_date = request('check_out_date');
        $booking->status = request('booking_status');
        $booking->save();
        return redirect()->back();
    }


}
