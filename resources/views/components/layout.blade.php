<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Bagan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" >
    <script src="script.js"></script>
</head>
<body class="indexBody">
    <header>
        <a href="/">
            <img src="img/Img.jpg" alt="Hotel Logo" style="max-width: 70px; margin-right: 1em;">
        </a>
        <nav>
            <a href="#overview">Overview</a>
            <a href="#accommodation">Accommodation</a>
            <a href="#cuisineh">Cuisine</a>
            <a href="#gallery">Gallery</a>
            <a href="#activities">Activities</a>
        </nav>
            <div class="addon">

                {{-- <a href="{{session()->pull('customerID') ? '/booking' : '/login'}}">Book Now</a> --}}



                @if (session('customerID'))
                    {{-- <div class="bookingAndLogout" style="margin-left:180px"> --}}
                        <a href="/booking" style="margin-left:90px">Book Now</a>
                        <a href="/logout" style="margin-right:5px">Log out</a>
                    {{-- </div> --}}
                @else
                    <a href="/login" style="margin-right:100px;">Login</a>
                    {{-- <a href="/register">Register</a> --}}
                @endif
            </div>

    </header>


    {{$slot}}


    <footer>
        <p>&copy; 2023 Royal Bagan. All rights reserved.</p>
    </footer>
</body>

</html>
