<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bookingBody">

    <div class="header-cover">
        <header>
            <a href="/">
                <img src="img/Img.jpg" alt="Hotel Logo" style="max-width: 70px; margin-right: 1em;">
            </a>




                <div class="addon">

                    {{-- <a href="{{session()->pull('customerID') ? '/booking' : '/login'}}">Book Now</a> --}}

                    <a href="{{'/'}}">Overview</a>

                    @if (session('customerID'))
                        {{-- <div class="bookingAndLogout" style="margin-left:180px"> --}}
                            <a href="/booking" style="color:#ce933b;font-weight:bold;">Book Now</a>
                            <a href="/logout" style="margin-right:5px">Log out</a>
                        {{-- </div> --}}
                    @else
                        <a href="/login" style="margin-right:100px;">Login</a>
                        {{-- <a href="/register">Register</a> --}}
                    @endif
                </div>

        </header>
    </div>

    {{-- <h1>Booking Page</h1> --}}
    {{-- <img src="../../img/royal-bagan-logo.png" alt="logo" width="500px" height="500px"/> --}}
    {{-- <div class="container booking-container" style="margin-top:90px;">
        <div class="column">
        <form action="/booking" method="POST">
            @csrf

            <div class="form-group my-3">
                <label for="check-in">Check-in Date</label>
                <input type="date" value="{{old('check-in')}}" id="check-in" name="check-in" class="form-control" />
            </div>
            @error('check-in')
                <p class="text-danger">{{$message}}</p>
            @enderror

            <div class="form-group my-3">
                <label for="check-out">Check-out Date</label>
                <input type="date" value="{{old('check-out')}}" name="check-out" class="form-control" />
            </div>
            @error('check-out')
                <p class="text-danger">{{$message}}</p>
            @enderror

            <div class="dropdown mb-4">
                <label for="roomType">Room Type:</label>
                <select name="roomType" id="roomType">
                    @foreach ($roomTypes as $roomType)
                        <option value="{{$roomType->title}}">{{$roomType->title}}</option>
                    @endforeach
                </select>
            </div>
            @error('roomType')
                <p class="text-danger">{{$message}}</p>
            @enderror

              <div class="dropdown mb-4">
                <label for="room">Available Room Number:</label>
                <select name="room" id="room">
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

            <button type="submit" class="btn btn-primary">Book Now</button>

        </form>



        </div>
    </div> --}}

    <div class="articleContainer">
        <h2>Discover Unforgettable Experiences, Exceptional Comfort.</h2>
        <p>Experience the epitome of hospitality as we cater to your every need, ensuring a memorable stay amidst the rich cultural tapestry of Bagan.</p>
    </div>

    <div class="bookingContainer">

        <h3>Book A Room</h3>
        <p>Book rooms with day check-in and check-out</p>

        <form action="/booking" method="POST">
            @csrf

            <div class="form-group">
                <label for="check-in">Check-in Date</label>
                <input type="date" value="{{old('check-in')}}" id="check-in" name="check-in" class="form-control" />
            </div>
            @error('check-in')
                <p class="text-danger">{{$message}}</p>
            @enderror

            <div class="form-group">
                <label for="check-out">Check-out Date</label>
                <input type="date" value="{{old('check-out')}}" name="check-out" class="form-control" />
            </div>
            @error('check-out')
                <p class="text-danger">{{$message}}</p>
            @enderror

            <div class="dropdown">
                <label for="roomType">Room Type</label><br/>
                <select name="roomType" id="roomType" class="roomType">
                    @foreach ($roomTypes as $roomType)
                        <option value="{{$roomType->title}}">{{$roomType->title}}</option>
                    @endforeach
                </select>
            </div>
            @error('roomType')
                <p class="text-danger">{{$message}}</p>
            @enderror

              <div class="dropdown">
                <label for="room">Available Room Number:</label><br/>
                <select name="room" id="room" class="roomNumber">
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

            <button type="submit" class="book-now-btn">Book Now</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

 {{-- <div class="form-group my-3">
                <label for="adault">Total Adault</label>
                <input type="text" value="{{old('adaults')}}" name="adault" id="adault" class="form-control my-2" placeholder="">
            </div>
            @error('adault')
                <p class="text-danger
                ">{{$message}}</p>
            @enderror

            <div class="form-group my-3">
                <label for="child">Total Child</label>
                <input type="text" value="{{old('child')}}" name="child" id="child" class="form-control my-2" placeholder="">
            </div>
            @error('adault')
                <p class="text-danger">{{$message}}</p>
            @enderror --}}
