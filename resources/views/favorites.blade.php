<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scholarship Hub | Scolarships</title>

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
                        <!-- Favorites if authenticated -->
                        <li class="nav-item bg-primary px-4 rounded-pill me-2">
                            <a class="nav-link text-light" href="{{ route('logout') }}">logout</a>
                        </li>
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
                <h2 class="mt-3" style='font-size:2rem; color: white;'>Want to take your scholarship to the next level?</h2>
            </div>
            <form action="{{ route('search') }}" method="get" class="mt-3">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search for scholarships...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <!--Favorites section-->
        @foreach($userFavorites as $favorite)
        <div class="card mb-3 scholarship-item" data-country="{{ $favorite->scholarship->country->id }}" data-category="{{ $favorite->scholarship->category->id }}">
            <div class="card-body">
                <h5 class="card-title">{{ $favorite->scholarship->name }}</h5>
                <p class="card-text">Eligibility Age: {{ $favorite->scholarship->eligibility_age }}</p>
                <p class="card-text">Qualification: {{ $favorite->scholarship->qualification }}</p>
                <p class="card-text">Website: <a href="{{ $favorite->scholarship->website_link }}" target="_blank">{{ $favorite->scholarship->website_link }}</a></p>
                <p class="card-text">Country: {{ $favorite->scholarship->country->name }}</p>
                <p class="card-text">Category: {{ $favorite->scholarship->category->name }}</p>
                <p class="card-text">Deadline: {{ $favorite->scholarship->deadline }}</p>
                <form action="{{ route('removeFromFavorites') }}" method="post">
                    @csrf
                    <input type="hidden" name="favorite_id" value="{{ $favorite->id }}">
                    <button type="submit" class="btn btn-danger">Remove from Favorites</button>
                </form>

            </div>
        </div>
        @endforeach
    </div>
</body>