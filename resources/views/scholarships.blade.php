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
                        @auth
                        <!-- Favorites if authenticated -->
                        <li class="nav-item bg-primary px-4 rounded-pill me-2">
                            <a class="nav-link text-light" href="{{ route('favorites') }}">Favorites</a>
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
                <h2 class="mt-3" style='font-size:2rem; color: white;'>Want to take your scholarship to the next level?</h2>
            </div>
            <form action="{{ route('search') }}" method="get" class="mt-3">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search for scholarships...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>


        <!-- Scholarship Listings -->
        <div class="scholarship-listings mt-5">
            <h2 class="mb-4">Available Scholarships</h2>

            <!-- Dropdown for selecting countries -->
            <div class="mb-3">
                <!--<label for="countryFilter" class="form-label">Filter by Country:</label>-->
                <select class="form-select btn btn-secondary btn-lg bg-danger" style="width:50%" id="countryFilter">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <!--Check box filter-->
            <div class="mb-3" style="position:absolute; top:135% ;left:70%">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="meritFilter">
                    <label class="form-check-label" for="meritFilter">
                        Merit-Based
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="needFilter">
                    <label class="form-check-label" for="needFilter">
                        Need-Based
                    </label>
                </div>
            </div>
            <!-- Display scholarships based on filter or all -->
            @foreach($scholarships as $scholarship)
            <div class="card mb-3 scholarship-item" data-country="{{ $scholarship->country->id }}" data-category="{{ $scholarship->category->id }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $scholarship->name }}</h5>
                    <p class="card-text">Eligibility Age: {{ $scholarship->eligibility_age }}</p>
                    <p class="card-text">Qualification: {{ $scholarship->qualification }}</p>
                    <p class="card-text">Website: <a href="{{ $scholarship->website_link }}" target="_blank">{{ $scholarship->website_link }}</a></p>
                    <p class="card-text">Country: {{ $scholarship->country->name }}</p>
                    <p class="card-text">Category: {{ $scholarship->category->name }}</p>
                    <p class="card-text">Deadline: {{ $scholarship->deadline }}</p>
                    @auth
                    <form action="{{ route('addToFavorites') }}" method="post">
                        @csrf
                        <input type="hidden" name="scholarship_id" value="{{ $scholarship->id }}">
                        <button type="submit" class="btn btn-primary">Add to Favorites</button>
                    </form>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        // Add event listener to the country filter dropdown
        document.getElementById('countryFilter').addEventListener('change', filterScholarships);

        // Add event listeners to the merit and need checkboxes
        document.getElementById('meritFilter').addEventListener('change', filterScholarships);
        document.getElementById('needFilter').addEventListener('change', filterScholarships);

        function filterScholarships() {
            // Get the selected country and checkbox states
            var selectedCountry = document.getElementById('countryFilter').value;
            var meritChecked = document.getElementById('meritFilter').checked;
            var needChecked = document.getElementById('needFilter').checked;

            // Show/hide scholarships based on the selected country and checkboxes
            document.querySelectorAll('.scholarship-item').forEach(function(item) {
                var itemCountry = item.getAttribute('data-country');
                var itemCategory = item.getAttribute('data-category');

                var showItem =
                    (selectedCountry === '' || selectedCountry === itemCountry) &&
                    (!meritChecked || itemCategory === '1' || itemCategory === '3') &&
                    (!needChecked || itemCategory === '2' || itemCategory === '3');

                item.style.display = showItem ? 'block' : 'none';
            });
        }
    </script>
</body>