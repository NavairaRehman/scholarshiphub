<!-- resources/views/search.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Search Results for "{{ $query }}"</h2>
        @foreach($scholarships as $scholarship)
            <div class="scholarship">
                <h3>{{ $scholarship->name }}</h3>
                <!-- Add other scholarship details here -->
            </div>
        @endforeach
    </div>
@endsection
