@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
    <h3>Location </h3>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-md-start">            
            <div class="col-md-auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $location)
                        <tr>
                            <td>{{$location->id}}</td>
                            <td>{{$location->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">
                        Add New Location
                    </div>
                    <div class="card-body">
                    <form class="row g-3" method="post" action="{{ route('location.store') }}">
                        @csrf
                        <div class="col-auto">
                        <label for="name">Location Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Location Name">  
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror   
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success mt-4">
                                Submit
                            </button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>           
    </div>
</div>
@endsection