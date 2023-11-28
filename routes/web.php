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

Route::get('/login',[CustomerController::class,'login']);
Route::post('/',[CustomerController::class,'customerLogin']);

Route::get('/logout',[CustomerController::class,'logout']);

// Route::get('/login',[LoginController::class,'create']);
// Route::post('/login',[LoginController::class,'customer']);

Route::get('/booking',[BookingController::class,'create']);
Route::post('/booking',[BookingController::class,'store']);


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



