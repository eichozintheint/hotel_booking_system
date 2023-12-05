<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Models\RoomType;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/register',[CustomerController::class,'register']);
Route::post('/register',[CustomerController::class,'store']);

Route::get('/login',[LoginController::class,'createLoginForm']);
Route::post('/',[LoginController::class,'customerLoggedin']);

Route::get('/logout',[LoginController::class,'logout']);

Route::get('/booking',[BookingController::class,'BookingCreate']);
Route::post('/booking',[BookingController::class,'store']);

Route::get('/booking-success',[BookingController::class,'show']);




// customers bookings

// a customer has one booking
// a booking has one customers

// customer table =>
// booking table => customer_id



// Route::get('/rooms', function() {
//     $input = Input::get_class('RoomType');

//     // Assuming $input is an array of room type IDs
//     $roomTypes = RoomType::find($input);

//     $rooms = collect();

//     foreach ($roomTypes as $roomType) {
//         $rooms = $rooms->merge($roomType->rooms()->get(['id', 'title']));
//     }

//     return response()->json($rooms);
// });

Route::get('/test',function(){
    view('test');
});



