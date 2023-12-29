<!-- resources/views/search.blade.php -->
@extends('scholarships')

@section('content')
    <div class="container">
        <h2>Search Results for "{{ $query }}"</h2>
        @foreach($scholarships as $scholarship)
            <div class="scholarship">
                <h3>{{ $scholarship->name }}</h3>
                <p class="card-text">Eligibility Age: {{ $scholarship->eligibility_age }}</p>
                <p class="card-text">Qualification: {{ $scholarship->qualification }}</p>
                <p class="card-text">Website: <a href="{{ $scholarship->website_link }}" target="_blank">{{ $scholarship->website_link }}</a></p>
                <p class="card-text">Country: {{ $scholarship->country->name }}</p>
                <p class="card-text">Category: {{ $scholarship->category->name }}</p>
                <p class="card-text">Deadline: {{ $scholarship->deadline }}</p>
            </div>
        @endforeach
    </div>
@endsection
