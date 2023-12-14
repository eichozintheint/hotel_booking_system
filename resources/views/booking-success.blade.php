<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="booking-history-body">

    <div class="header-cover">
        <header style="height:50px;">
            <a href="/">
                <img src="img/Img.jpg" alt="Hotel Logo" style="max-width: 70px; margin-right: 1em;">
            </a>




                <div class="addon">

                    {{-- <a href="{{session()->pull('customerID') ? '/booking' : '/login'}}">Book Now</a> --}}

                    <a href="{{'/'}}">Overview</a>

                    <a href="" style="color:#ce933b;font-weight:bold;">Booking History</a>

                    @if (Auth::guard('customers')->check())
                        <a href="/booking" style="margin-left:90px">Book Now</a>
                        <a href="/logout" style="margin-right:5px">Log out</a>
                        <a href="/customer/profile"><img src="img/person1.png" alt="" class="loggedin-cus-logo"></a>
                    @else
                        <a href="/login" style="margin-right:100px;">Login</a>
                    @endif
                </div>

        </header>
    </div>

    <div class="baganimg" style="margin-top:10px;">
        <img src="img/bagan6.jpeg" alt="bagan6" width="750px" height="510px;">
    </div>

    {{-- <div class="booking-history"> --}}
        <div class="first-container">
            <h2>Booking History</h2>

            {{-- <h3>Username : {{$bookingCustomer}}</h3> --}}
            {{-- <h3>Email : {{$bookingEmail}}</h3> --}}
            <h3>Username : {{Auth::guard('customers')->user()->username}}</h3>
            <h3>Email : {{Auth::guard('customers')->user()->email}}</h3>
            <h4>Total Booking Days : {{$totalDays}}</h4>
        </div>

        <div class="info">
            <p>Check in date : {{$details->check_in_date}}</p>
            <p>Check out date : {{$details->check_out_date}}</p>
            <p>Room Type : {{$selectedRoomTypeTitle}}</p>
            <p>Room Number : {{$details->room}}</p>
            <p>Booking Status : {{$details->status}}</p>

            <h3>Total price is {{$totalPrice}} MMK.</h3>
            <p style="font-style:italic">Thank you for choosing our service</p>
        </div>



    {{-- </div> --}}

    <div class="baganimg2">
        <img src="/img/left.jpg" alt="bagan5" width="200px;" height="160px;">
    </div>

    <div class="baganimg3">
        <img src="/img/Right.jpg" alt="bagan5" width="200px;" height="160px;">
    </div>

</body>
</html>
