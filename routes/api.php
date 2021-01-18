<?php

use App\Http\Controllers\ApiHotelController;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('rooms',[ApiHotelController::class, 'index']);
//show room by id
Route::get('rooms/show/{id}',[ApiHotelController::class,'show']);
//delete room by id
Route::get('rooms/delete/{id}',[ApiHotelController::class,'delete']);
// make reserve
Route::post('bookings/create',[ApiHotelController::class,'store']);
//cancel reserve by number reserve
Route::get('bookings/cancel/{bookin_number}',[ApiHotelController::class,'cancel']);
