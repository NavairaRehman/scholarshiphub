<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Your Logo</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('downloads') }}">Download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('scholarships') }}">Scholarships</a>
                        </li>
                    </ul>
                </div>
                @auth
                    <a href="{{ route('favorites') }}" class="btn btn-warning"><i class="fa fa-star"></i> Favorites</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a> 
                    <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                @endauth
            </div>
        </nav>

        <!-- Welcome Section -->
        <div class="welcome-section mt-5">
            <img src="{{ asset('images/welcome-image.jpg') }}" alt="Welcome Image" class="img-fluid rounded">
            <h2 class="mt-3">Want to take your scholarship to the next level?</h2>
            <form action="{{ route('search') }}" method="get" class="mt-3">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search for scholarships...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <!-- Countries Section -->
        <div class="countries-section mt-5">
            <h3>Explore Scholarships by Country</h3>
            <ul class="list-group">
                @foreach($countries as $country)
                    <li class="list-group-item"><a href="{{ route('country', $country->id) }}">{{ $country->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
