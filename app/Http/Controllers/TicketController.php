<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatAllocation;
use App\Models\Trip;

class TicketController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        $seats = SeatAllocation::whereNull('user_id')->get();

        return view('tickets.purchase', ['trips' => $trips, 'seats' => $seats]);

    }
    public function purchase()
    {
        $trips = Trip::all();
        $seats = SeatAllocation::whereNull('user_id')->get();

        return view('tickets.purchase', compact('trips', 'seats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'seat_number' => 'required|exists:seat_allocations,seat_number,trip_id,' . $request->input('trip_id') . ',user_id,NULL',
            'user_name' => 'required|string',
        ]);

        $trip = Trip::findOrFail($request->input('trip_id'));
        $seat = SeatAllocation::where('trip_id', $trip->id)
            ->where('seat_number', $request->input('seat_number'))
            ->whereNull('user_id')
            ->first();

        // Update seat allocation with user information
        $seat->update([
            'user_id' => 1, // Assuming you have user authentication
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket purchased successfully');
    }

    public function getSeatNumbers($tripId)
    {
        
        $seats = SeatAllocation::where('trip_id', $tripId)
            ->whereNull('user_id')
            ->pluck('seat_number');
            return response()->json($seats);
    }

   
    
}
