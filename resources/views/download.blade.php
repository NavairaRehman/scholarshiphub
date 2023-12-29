<!-- downloads.blade.php -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scholarship Hub | Downloads</title>

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
                <div class="collapse navbar-collapse" id="navbarMain">
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

        <!-- Downloads Section -->
        <div class="downloads-section mt-5">
            <h2>Downloads</h2>

            @foreach($downloads as $download)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $download->name }}</h5>
                    <p class="card-text">Link: <a href="{{ $download->link }}" target="_blank">{{ $download->link }}</a></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>