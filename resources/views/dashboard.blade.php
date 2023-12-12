<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
</head>
    <body class="dashboard-body">
    <div class="overall-container">



        {{-- ***************************Side Bar**************************  --}}
        <div class="sidebar">

            <div class="logo">
                <img src="img/Img.jpg" alt="Img" class="logo-img">
            </div>

            <h3 class="logo-caption">Royal Bagan</h3>

            <div class="categories">
                <div class="cat1">
                    <a href="#dashboard-panel">Dashboard</a>
                </div>
                <div class="cat2">
                    <a href="#customer-panel">Customer</a>
                </div>
                <div class="cat3">
                    <a href="#roomtype-panel">Room Type</a>
                </div>
                <div class="cat4">
                    <a href="#room-panel">Room</a>
                </div>
                <div class="cat5">
                    <a href="#booking-panel">Bookings</a>
                </div>
                <div class="cat6">
                    <a href="#review-panel">Review</a>
                </div>
            </div>

        </div>



        {{-- ********************************Left Container*******************************  --}}
        <div class="left-container">

            {{-- ********************************Admin Account Panel***************************  --}}
            <div class="admin-account-panel">

                <div class="searchbar">
                    <input type="text" name="search" class="search" placeholder="Search here...">
                </div>

                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
                    <div class="circle"></div>
                </div>

                <div class="mail">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="admin">
                    <a href="/admin-profile"><i class="fa-solid fa-user user-icon"></i></a><br/>
                    <span>Admin <i class="fa-solid fa-check"></i></span>
                </div>

                <div class="adminLogout">
                    <a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a><br/>
                    <span>Log out</span>
                </div>
            </div>

            <div class="dashboard-panel" id="dashboard-panel">

                <div class="totalBookings">
                    <span class="bookingsCount">{{$bookings}}</span>
                    <span class="bookingsCaption">Total Bookings</span>
                    <i class="fa-regular fa-bookmark"></i>
                </div>

                <div class="newBookings">
                    <span class="scheduleBookingsCount">{{$scheduleBookings}}</span>
                    <span class="scheduleBookingsCaption">Schedule Bookings</span>
                    <i class="fa-regular fa-calendar"></i>
                </div>

                <div class="acceptedBookings">
                    <span class="acceptedBookingsCount">{{$acceptedBookings}}</span>
                    <span class="acceptedBookingsCaption">Accepted Bookings</span>
                    <i class="fa-regular fa-calendar"></i>
                </div>

                <div class="availableRooms">
                    <span class="availableRoomsCount">{{$availableRooms}}</span>
                    <span class="availableRoomsCaption">Available Rooms</span>
                    <i class="fa-solid fa-bed"></i>
                </div>

                <div class="checkin">
                    <span class="checkinCount">{{$checkinNumber}}</span>
                    <span class="checkinCaption">Check-in</span>
                    <i class="fa-solid fa-right-to-bracket"></i>
                </div>

                <div class="checkout">
                    <span class="checkoutCount">{{$checkoutNumber}}</span>
                    <span class="checkoutCaption">Check-out</span>
                    <i class="fa-solid fa-right-from-bracket"></i>
                </div>

                {{-- <div id="calendar-container" class="calendar-container"></div> --}}
            </div>

            {{-- *********************************Customer Panel*********************************  --}}
            <div class="customer-panel" id="customer-panel">
                <table class="customer-table">
                    <thead>
                        <tr>
                        <th>id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Usertype</th>
                        <th>Created_at</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->username}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->usertype}}</td>
                                    <td>{{$customer->created_at}}</td>
                                    <td>
                                        <form action="dashboard/customers/delete/{{$customer->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="customer-delete-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>

            {{-- **********************************Room Type Panel*****************************  --}}
            <div class="roomtype-panel" id="roomtype-panel">
                @if (Session::has('success'))
                    <p class="text-danger">{{ session('success') }}</p>
                @endif
                <table class="roomtype-table">
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th></th>
                    </tr>

                    @foreach ($roomtypes as $roomtype)
                        <tr>
                            <td>{{$roomtype->id}}</td>
                            <td>{{$roomtype->title}}</td>
                            <td>{{$roomtype->detail}}</td>
                            <td>
                                <form action="dashboard/roomtype/delete/{{$roomtype->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit0">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <tr class="add-roomtype-btn">
                        <form action="/dashboard/createroomtype" method="GET">
                            <td colspan="4">
                                <button type="submit" class="add-roomtype-btn-1">Add Room Type</button>
                            </td>
                        </form>
                    </tr>

                </table>
            </div>

            {{-- ********************************Room Panel********************************  --}}
            <div class="room-panel" id="room-panel">
                @if (Session::has('success'))
                    <p class="text-danger">{{ session('success') }}</p>
                @endif
                <table class="room-panel-table">
                    <thead>
                        <th>id</th>
                        <th>Title</th>
                        <th>Roomtype_ID</th>
                        <th>Available Status</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{$room->id}}</td>
                                <td>{{$room->title}}</td>
                                <td>{{$room->roomtype_id}}</td>
                                <td>{{$room->available_status}}</td>
                                <form action="/dashboard/room/update/{{$room->id}}" method="GET">
                                    @csrf
                                    <td class="room-update-btn">
                                        <button type="submit" class="room-update-btn">Update</button>
                                    </td>
                                </form>
                                <form action="/dashboard/room/delete/{{$room->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td class="room-delete-btn">
                                        <button type="submit" class="room-delete-btn">Delete</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        <tfoot>
                            <form action="/dashboard/createnewroom" method="GET">
                                @csrf
                                <td colspan="6">
                                    <button type="submit" class="addnewroom-btn">Add New Room</button>
                                </td>
                            </form>
                        </tfoot>
                    </tbody>
                </table>
            </div>


            </div>

        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}
</body>
</html>
