@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Purchase Ticket</h3>
    </div>
    <div class="card-body"> 
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-md-start">
            <div class="col-md-7">

            <form method="post" action="{{ route('tickets.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="trip_id">Select Trip:</label>
                    <select name="trip_id" id="trip_id" required class="form-control">
                        @foreach($trips as $trip)
                            <option value="{{ $trip->id }}">{{ $trip->trip_date }} - {{ $trip->departureLocation->name }} to {{ $trip->arrivalLocation->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="seat_number">Select Seat Number:</label>
                    <select id="seat_number" class="form-control" name="seat_number">
                        <option value="">Select Seat Number</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="user_name">Your Name:</label>
                    <input type="text" name="user_name" class="form-control" placeholder="Your Name" required>
                </div>

                <button type="submit" class="btn btn-primary">Purchase Ticket</button>
            </form>
            </div>            
        </div> 
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#trip_id').change(function () {
            var tripId = $(this).val();
            
            $('#seat_number').empty().append('<option value="">Select Seat Number</option>');

            if (tripId) {
                
                $.get('/get-seat-numbers/' + tripId, function (data) {
                    $.each(data, function (key, value) {
                        $('#seat_number').append('<option value="' + value + '">' + value + '</option>');
                    });
                });
            }
        });
    });
</script>
@endsection




