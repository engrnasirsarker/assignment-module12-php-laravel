@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Seats Alocation</h3>
    </div>
    <div class="card-body">  
        
        <div class="row justify-content-md-start">   
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">
                    Alocated Seat List
                </div>
                <div class="card-body">
                    <form class="row g-3" method="get" action="{{ url('seats-alocation-show') }}">
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
                        <h3>Alocated Seats</h3>
                        <ul>
                            @foreach($seats as $seat)
                                <li>Seat Number: {{ $seat->seat_number }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">
                        Add New Seat
                    </div>
                    <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form  method="post" action="{{ route('seat.alocation.store') }}">
                        @csrf                        
                        <div class="mb-3">
                            <label for="trip" class="form-label">
                                Select Trip
                            </label>
                            <select name="trip_id" id="" class="form-control">
                                @foreach($trips as $trip)
                                    <option value="{{ $trip->id }}">
                                    {{ $trip->trip_date }} 
                                        - {{ $trip->departureLocation->name }} 
                                        to {{ $trip->arrivalLocation->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="seat_no" class="form-label">Seat No</label>
                            <input type="text" class="form-control" id="seat_no" name="seat_no" placeholder="Enter Seat No">    
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection