<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    function index(){
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    function create(){
        
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $location = new Location;
        $location->name = $request->name;
        $location->save();
        return redirect('/locations')->with('success', 'Location created successfully');
    }
}
