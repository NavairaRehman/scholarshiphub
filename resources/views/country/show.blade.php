<!-- resources/views/country/show.blade.php -->
@extends('scholarships')

@section('content')
    <div class="card mb-3 scholarship-item">
        <h2>Scholarships in {{ $country->name }}</h2>
        @foreach($scholarships as $scholarship)
            <div class="scholarship">
                <h3>{{ $scholarship->name }}</h3>
                <!-- Add other scholarship details here -->
            </div>
        @endforeach
    </div>
@endsection
