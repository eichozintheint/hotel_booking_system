<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>Booking Page</h1>
    {{-- <img src="../../img/royal-bagan-logo.png" alt="logo" width="500px" height="500px"/> --}}
    <div class="container">
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

            {{-- <div class="form-group my-3">
                <label for="roomTypes">Room Types</label>
                    <select name="roomTypes" id="roomTypes" onchange="showRooms()">
                        @foreach ($roomTypes as $roomType)
                            <option value="{{$roomType->title}}">{{$roomType->title}}</option>
                        @endforeach
                    </select>
            </div>
            @error('roomTypes')
                <p class="text-danger">{{$message}}</p>
            @enderror --}}

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Room Types
                </button>
                <ul class="dropdown-menu">
                    @foreach ($roomTypes as $roomType)
                        <li><a class="dropdown-item" href="#">{{$roomType->title}}</a></li>
                    @endforeach
                </ul>
              </div>

            <div class="form-group my-3">
                <label for="availableRoom">Available Rooms</label>
                    <select name="availableRoom" id="availableRoom">
                        @foreach ($rooms as $room)
                            <option value="{{$room->id}}">{{$room->title}}</option>
                        @endforeach
                    </select>
            </div>
            @error('availableRoom')
                <p class="text-danger">{{$message}}</p>
            @enderror

            <div class="form-group my-3">
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
            @enderror

            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



    <script>
        $(document).on("change", '#roomTypes', function () {
        var stateUrl = "{{ url('Room::class')}}";

        $.get(stateUrl,
                {option: $(this).val()},
                function (data) {
                    var model = $('#availabelRoom');
                    model.empty();
                    model.append("<option>Available room</option>");
                    $.each(data, function (index, element) {
                        model.append("<option value='" + element.id + "'>" + element.title + "</option>");
                    });
                }
        );
    });
    </script>


</body>
</html>
