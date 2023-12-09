<div class="bookingContainer">

    <h3>Book A Room</h3>
    <p>Book rooms with day check-in and check-out</p>

    <form action="/booking" method="POST">
        @csrf

        <div class="form-group">
            <label for="check-in">Check-in Date</label>
            <input type="date" value="{{old('check-in')}}" id="check-in" name="check-in" class="form-control" />
            @error('check-in')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="check-out">Check-out Date</label>
            <input type="date" value="{{old('check-out')}}" name="check-out" class="form-control" />
            @error('check-out')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="dropdown">
            <label for="roomType">Room Type</label><br/>
            <select name="roomType" id="roomType" class="roomType" wire:model.live="selectedRoomType">
                    <option value="">Select a Room Type</option>
                @foreach ($roomTypes as $roomType)
                    <option value="{{$roomType->id}}">{{$roomType->title}}</option>
                @endforeach
            </select>
        </div>
        @error('roomType')
            <p class="text-danger">{{$message}}</p>
        @enderror

        @if (!is_null($rooms))
             <div class="dropdown">
                 <label for="room">Available Room Number</label><br/>
                 <select name="room" id="room" class="roomNumber" wire:model.live="selectedRoom">
                             <option value="">Select a Room</option>
                         @foreach ($rooms as $room)
                         @if (!$booking->where('room',$room->title)->first())
                             <option value="{{$room->title}}">{{$room->title}}</option>
                         @endif
                         @endforeach
                 </select>
               </div>
             @error('room')
                 <p class="text-danger">{{$message}}</p>
             @enderror
        @endif

        <button type="submit" class="book-now-btn">Book Now</button>

    </form>

</div>
