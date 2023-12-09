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
    @livewireStyles
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
                        <a href="/logout" style="margin-right:100px;">Logout</a>
                        {{-- <a href="/register">Register</a> --}}
                    @endif
                </div>
        </header>
    </div>

    <div class="articleContainer">
        <h2>Discover Unforgettable Experiences, Exceptional Comfort.</h2>
        <p>Experience the epitome of hospitality as we cater to your every need, ensuring a memorable stay amidst the rich cultural tapestry of Bagan.</p>
    </div>

    @livewire('handle-rooms');

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

@livewireScripts
</body>
</html>


//  {{-- <div class="form-group my-3">
//                 <label for="adault">Total Adault</label>
//                 <input type="text" value="{{old('adaults')}}" name="adault" id="adault" class="form-control my-2" placeholder="">
//             </div>
//             @error('adault')
//                 <p class="text-danger
//                 ">{{$message}}</p>
//             @enderror

//             <div class="form-group my-3">
//                 <label for="child">Total Child</label>
//                 <input type="text" value="{{old('child')}}" name="child" id="child" class="form-control my-2" placeholder="">
//             </div>
//             @error('adault')
//                 <p class="text-danger">{{$message}}</p>
//             @enderror --}}
