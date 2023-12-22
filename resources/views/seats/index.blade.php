@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Available Seats </h3>
    </div>
    <div class="card-body">        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form class="row g-3" method="get" action="{{ route('seats.show') }}">
            <div class="col-auto">
            <label for="trip_id">Select Trip:</label>
                <select name="trip_id" required class="form-control">
                    @foreach($trips as $trip)
                        <option value="{{ $trip->id }}">
                            {{ $trip->trip_date }} 
                            - {{ $trip->departureLocation->name }} 
                            to {{ $trip->arrivalLocation->name }}
                        </option>
                    @endforeach
                </select>        
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success mt-4">
                    View Seats
                </button>
            </div>
        </form>
    
        @if(isset($seats))
            <h3>Available Seats</h3>
            <ul>
                @foreach($seats as $seat)
                    <li>Seat Number: {{ $seat->seat_number }}</li>
                @endforeach
            </ul>
        @endif

    </div>
</div>
@endsection