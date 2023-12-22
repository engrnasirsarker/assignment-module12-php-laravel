<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Trip;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('trip.index', compact('trips'));
    }
    public function create()
    {
        $locations = Location::all();
        return view('trip.create', compact('locations'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'trip_date' => 'required|date',
            'departure_location' => 'required|exists:locations,id',
            'arrival_location' => 'required|exists:locations,id|different:departure_location',
        ]);

        // Create a new trip
        Trip::create([
            'trip_date' => $request->input('trip_date'),
            'departure_location_id' => $request->input('departure_location'),
            'arrival_location_id' => $request->input('arrival_location'),
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully');
    }
}
