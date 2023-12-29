<!-- resources/views/welcome.blade.php -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Scholarship Hub</title>

    <!-- Bootstrap CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <!-- Navbar (Top) -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Logo on the left -->
                <a class="navbar-brand" href="#">Your Logo</a>

                <div class="collapse navbar-collapse" id="navbarTop">
                    <ul class="navbar-nav ms-auto ul-">
                        @auth
                        <!-- Favorites if authenticated -->
                        <li class="nav-item bg-primary px-4 rounded-pill me-2">
                            <a class="nav-link text-light" href="{{ route('favorites') }}">Favorites</a>
                        </li>
                        <li class="nav-item bg-primary px-4 rounded-pill me-2">
                            <a class="nav-link text-light" href="{{ route('logout') }}">logout</a>
                        </li>
                        @else
                        <!-- Login/Register if not authenticated -->
                        <li class="nav-item bg-primary px-4 rounded-pill me-2">
                            <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item bg-primary px-4 rounded-pill">
                            <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Navbar (Main) -->
        <nav class="navbar navbar-expand-lg navbar-light bg-danger">
            <div class="container-fluid">
                <div class="collapse navbar-collapse " id="navbarMain">
                    <ul class="navbar-nav">
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="{{ route('downloads') }}">Download</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="{{ route('scholarships') }}">Scholarships</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Welcome Section -->
        <div class="welcome-section mt-5 position-relative">
            <img src="{{ asset('images/welcome-image.jpg') }}" alt="Welcome Image" class="img-fluid rounded">

            <div class="text-overlay" style="position:absolute; top:40%; left:0%; transform: translate(-50,-50);text-align:center; width:100%">
                <h2 class="mt-3" style='font-size:3rem; color: white;'>Want to take your studies to the next level?</h2>
                <h1 class="mt-3" style='font-size:2rem; color: white;'>lets look at some scholarships</h1>
            </div>
            <form action="{{ route('search') }}" method="get" class="mt-3">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search by Country...">
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
</body>