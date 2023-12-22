@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Create Trip</h3>
    </div>
    <div class="card-body">
    <a href="{{url('trips')}}" class="btn btn-dark">Back</a>

    <form method="post" action="{{ route('trips.store') }}">
    @csrf
    <div class="mb-3 row">
        <label for="date" class="col-sm-2 text-end">Trip Date:</label>
        <div class="col-sm-6">
        <input type="date" class="form-control" id="date" name="trip_date" required>
        @error('trip_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror   
        </div>
    </div>
    <div class="mb-3 row">
        <label for="date" class="col-sm-2 text-end">Departure Location:</label>
        <div class="col-sm-6">
        <select name="departure_location" required class="form-control">
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        
        </div>
    </div>
    <div class="mb-3 row">
        <label for="date" class="col-sm-2 text-end">Arrival Location:</label>
        <div class="col-sm-6">
        <select name="arrival_location" required class="form-control">
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        </div>
    </div>
        
    <div class="mb-3 row">
        <label for="date" class="col-sm-2 text-end"></label>
        <div class="col-sm-6">
        <button type="submit" class="btn btn-primary">Create Trip</button>
        </div>
    </div>
        
        
    </form>
    </div>
</div>
@endsection