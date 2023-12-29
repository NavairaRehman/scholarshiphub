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
                    <a href="{{ route('favorites') }}"><i class="fa fa-star"></i></a>
                @else
                    <a href="{{ route('login') }}">Login</a> / <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </nav>

        <!-- Welcome Section -->
        <div class="welcome-section">
            <img src="{{ asset('images/welcome-image.jpg') }}" alt="Welcome Image">
            <h2>Want to take your scholarship to the next level?</h2>
            <form action="{{ route('search') }}" method="get">
                <input type="text" name="query" placeholder="Search for scholarships...">
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Countries Section -->
        <div class="countries-section">
            <h3>Explore Scholarships by Country</h3>
            <ul>
                @foreach($countries as $country)
                    <li><a href="{{ route('country', $country->id) }}">{{ $country->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
