<?php

use App\Http\Controllers\SportController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MatchingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Event
Route::get('/events',([EventController::class,'index']));
Route::get('/events/search/{keyword}',([EventController::class,'search']));
Route::get('/events/{id}',([EventController::class,'show']));
Route::post('/booking',([BookingController::class,'store']));
Route::post('events',([EventController::class,'store']));
// update event
Route::put('/events/{id}',([EventController::class,'update']));
// delete event
Route::delete('/events/{id}',([EventController::class,'destroy']));
// Matching
Route::post('/matchings',([MatchingController::class,'store']));
Route::get('/matchings',([MatchingController::class,'index']));
