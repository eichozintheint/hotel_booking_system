<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Booking status</h1>

        <p>Check in date : {{$details->check_in_date}}</p>
        <p>Check out date : {{$details->check_out_date}}</p>
        <p>Room Type : {{$details->room_type}}</p>
        <p>Room Number : {{$details->room}}</p>

        <h3>Total price is {{$totalPrice}} MMK.</h3>

</body>
</html>
