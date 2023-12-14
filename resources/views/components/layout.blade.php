<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Bagan</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" >
    <script src="script.js"></script>
</head>
<body class="body">
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
                @if (Auth::guard('customers')->check())
                    <div class="book_now"><a href="/booking" >Book Now</a></div>
                    <div class="log_out"><a href="/logout" >Log out</a></div>
                    <div class="customer_profile_img">
                        <img src="img/person1.png" alt="" >
                        <div class="customer_profile_box">
                            <h5>Username : {{Auth::guard('customers')->user()->username}}</h5>
                            <h5>Email : {{Auth::guard('customers')->user()->email}}</h5>
                        </div>
                    </div>
                @else
                    <a href="/login" style="margin-right:100px;">Login</a>
                @endif

                {{-- @if (session('customerID'))
                        <a href="/booking" style="margin-left:90px">Book Now</a>
                        <a href="/logout" style="margin-right:5px">Log out</a>
                @else
                    <a href="/login" style="margin-right:100px;">Login</a>
                @endif --}}
            </div>



    </header>


    {{$slot}}



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
