<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head> 
<body>
    
    <div class="container">
    <a href="{{ url('/locations') }}" 
        class="btn rounded-0 @if(url()->current() == url('/locations')) disabled btn-dark @else btn-success @endif">
        Location
    </a>
    <a href="{{ url('/trips') }}" 
        class="btn rounded-0 @if(url()->current() == url('/trips')) disabled btn-dark @else btn-success @endif">
        Trips
    </a>
    <a href="{{ url('/seats') }}" 
        class="btn rounded-0 @if(url()->current() == url('/seats')) disabled btn-dark @else btn-success @endif">
        Available Seat
    </a>
    <a href="{{ url('/seats-alocation-list') }}" 
        class="btn rounded-0 @if(url()->current() == url('/seats-alocation-list')) disabled btn-dark @else btn-success @endif">
        Seat Alocation
    </a>
    <a href="{{ url('/tickets') }}" 
        class="btn rounded-0 @if(url()->current() == url('/tickets')) disabled btn-dark @else btn-success @endif">
        Ticket
    </a>

    @yield('content')
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>