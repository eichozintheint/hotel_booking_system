<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="customer-profile-body">
    <div class="header-cover">
        <header style="height:50px;">
            <a href="/">
                <img src="/img/Img.jpg" alt="Hotel Logo" style="max-width: 70px; margin-right: 1em;">
            </a>

            <div class="addon" style="margin-top:15px;">
                <a href="{{'/'}}">Overview</a>
                <a href="" style="color:#ce933b;font-weight:bold;margin-right:100px;">Profile</a>
                {{-- @if (Auth::guard('customers')->check())
                    <a href="/booking" style="margin-left:90px">Book Now</a>
                    <a href="/logout" style="margin-right:5px">Log out</a>
                @else
                    <a href="/login" style="margin-right:100px;">Login</a>
                @endif --}}
            </div>
        </header>
    </div>
    <div class="profile-container">
        <h2>Your Profile</h2>
        <h4>Username : {{Auth::guard('customers')->user()->username}}</h4>
        <h4>Email : {{Auth::guard('customers')->user()->email}}</h4>
        <h4></h4>
    </div>
</body>
</html>
