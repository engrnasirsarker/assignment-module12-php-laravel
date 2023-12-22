<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\LocationController;

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
    return view('app');
});

// Trip route
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips', [TripController::class, 'store'])->name('trips.store');

// Seat route
Route::get('/seats', [SeatController::class, 'index'])->name('seats.index');
Route::get('/seats-alocation-list', [SeatController::class, 'alocationSeatList']);
Route::get('/seats-alocation-show', [SeatController::class, 'alocationSeatShow']);
Route::post('/seat-alocation-store', [SeatController::class, 'alocationSeatStore'])->name('seat.alocation.store');
Route::get('/seat/create', [SeatController::class, 'store'])->name('seat.create');
Route::get('/seats/show', [SeatController::class, 'showAvailableSeats'])->name('seats.show');

// ticket route
Route::get('/tickets/purchase', [TicketController::class, 'purchase'])->name('tickets.purchase');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/get-seat-numbers/{trip}', [TicketController::class, 'getSeatNumbers']);

// Location Route
Route::get('/locations', [LocationController::class, 'index'])->name('location.index');
Route::post('/location', [LocationController::class, 'store'])->name('location.store');