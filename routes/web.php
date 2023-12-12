<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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
// Route::livewire('/handle-rooms', HandleRooms::class);

Route::get('/booking-success',[BookingController::class,'show']);

// Dashboard - customers
Route::get('/dashboard',[DashboardController::class,'getDataForAdminDashboard']);
Route::delete('/dashboard/customers/delete/{id}',[DashboardController::class,'destroyCustomer']);

// Dashboard -  create roomType
Route::get('/dashboard/createroomtype',[DashboardController::class,'createroomtype']);
Route::post('/dashboard/createroomtype',[DashboardController::class,'storeroomtype']);

// Dashboard - delete roomType
Route::delete('/dashboard/roomtype/delete/{id}',[DashboardController::class,'destroyRoomtype']);

// Dashboard - create room
Route::get('/dashboard/createnewroom',[DashboardController::class,'createroom']);
Route::post('/dashboard/createnewroom',[DashboardController::class,'storeroom']);

// Dashboard - delete room
Route::delete('/dashboard/room/delete/{id}',[DashboardController::class,'destroyRoom']);

// Dashboard - update room
Route::get('/dashboard/room/update/{id}',[DashboardController::class,'createRoomUpdate']);
Route::put('/dashboard/room/update/{id}',[DashboardController::class,'storeUpdateRoomAvailability']);




