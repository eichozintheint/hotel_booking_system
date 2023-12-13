<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="/dashboard/bookings/updated" method="POST">
        @csrf
        @method('PUT')
        <div class="container-sm">
            {{-- <div class="form-group">
                <label for="room_type">Room Type</label>
                <select name="room_type" class="form-control" id="room_type">
                  <option>1</option>
                  <option>2</option>
                </select>
              </div> --}}
              <div class="form-group">
                <label for="room_number">Room Number</label>
                <select name="room_number" class="form-control" id="room_number">
                    @foreach ($available_rooms as $available_room)
                        <option value="{{$available_room->title}}">{{$available_room->title}}</option>
                    @endforeach
                </select>
              </div>
            <div class="mb-3">
                <label for="check_in_date" value="{{old('check_in_date')}}" class="form-label">Check-in Date</label>
                <input type="date" class="form-control" name="check_in_date" id="check_in_date">
            </div>
            <div class="mb-3">
                <label for="check_out_date" class="form-label">Check-in Date</label>
                <input type="date" class="form-control" name="check_out_date" id="check_out_date">
            </div>
            <div class="form-group mb-3">
                <label for="booking_status">Booking Status</label>
                <select name="booking_status" value="{{old('status')}}" class="form-control" id="booking_status">
                    @foreach ($statusOfBookings as $statusOfBooking)
                        <option value="{{$statusOfBooking->status}}">{{$statusOfBooking->status}}</option>
                        @if ($statusOfBooking->status==='accepted')
                            <option value="pending">pending</option>
                        @else
                            <option value="accepted">accepted</option>
                        @endif
                    @endforeach
                </select>
              </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Booking</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
