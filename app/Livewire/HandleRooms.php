<?php

namespace App\Livewire;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Booking;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class HandleRooms extends Component
{
    public $selectedRoomType = null;
    public $selectedRoom = null;
    public $rooms = [];


    public function render()
    {
        return view('livewire.handle-rooms',[
            'roomTypes'=>RoomType::all(),
            'booking'=>Booking::all()
        ]);
    }

    public function updatedSelectedRoomType($roomtype_id)
    {
        $this->rooms = Room::where('roomtype_id', $roomtype_id)->get();
    }
}
