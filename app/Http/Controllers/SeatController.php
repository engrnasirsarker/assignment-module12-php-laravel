<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatAllocation;
use App\Models\Trip;

class SeatController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('seats.index', compact('trips'));
    }
    public function alocationSeatStore(Request $request)
    {
        $request->validate([
            'trip_id' => 'required',
            'seat_no' => 'required',
        ]);
        SeatAllocation::create([
            'trip_id' => $request->input('trip_id'),
            'seat_number' => $request->input('seat_no'),            
        ]);
        return redirect('/seats-alocation-list')->with('success', 'Seat Allocated Successfully');
    }
    public function showAvailableSeats(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
        ]);
        $trips = Trip::all(); 
        $trip = Trip::findOrFail($request->input('trip_id'));
        $seats = SeatAllocation::where('trip_id', $trip->id)
            ->whereNull('user_id')
            ->get();

        return view('seats.index', compact('trips', 'seats'));
    }
    
    public function alocationSeatList()
    {
        $trips = Trip::all();
        return view('seats.alocation_seats_list', compact('trips'));
    }
    public function alocationSeatShow(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
        ]);
        $trips = Trip::all(); 
        $trip = Trip::findOrFail($request->input('trip_id'));
        $seats = SeatAllocation::where('trip_id', $trip->id)->get();

        return view('seats.alocation_seats_list', compact('trips', 'seats'));
    }
}
