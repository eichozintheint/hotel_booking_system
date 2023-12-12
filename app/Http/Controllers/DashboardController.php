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
        $bookings = Booking::all()->count();
        $scheduleBookings = Booking::where('status','pending')->count();
        $acceptedBookings = Booking::where('status','accepted')->count();
        $availableRooms = Room::all()->count() - Booking::all()->count();

        $now = Date::now();
        $todayDate = $now->toDateString();
        $checkinNumber = Booking::where('check_in_date',$todayDate)->count();
        $checkoutNumber = Booking::where('check_out_date',$todayDate)->count();

        $getAllCustomer = Customer::all();

        $roomtypes = RoomType::all();

        $rooms = Room::all();

        return view('dashboard',[
            'bookings'=>$bookings,
            'scheduleBookings'=>$scheduleBookings,
            'acceptedBookings'=>$acceptedBookings,
            'availableRooms'=>$availableRooms,
            'checkinNumber'=>$checkinNumber,
            'checkoutNumber'=>$checkoutNumber,
            'customers'=>$getAllCustomer,
            'roomtypes'=>$roomtypes,
            'rooms'=>$rooms
        ]);
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
}
