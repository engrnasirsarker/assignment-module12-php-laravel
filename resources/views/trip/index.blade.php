@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
    <h3>Trips </h3>
    </div>
    <div class="card-body">
        <a href="{{url('trips/create')}}" class="btn btn-primary">Add New</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Deperture</th>
                    <th>Arival</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trips as $trip)
                <tr>
                    <td>{{$trip->trip_date}}</td>
                    <td>{{$trip->departureLocation->name}}</td>
                    <td>{{$trip->arrivalLocation->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection