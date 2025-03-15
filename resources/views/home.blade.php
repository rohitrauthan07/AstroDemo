<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('header')

    <!-- Carousel Section -->
    <div id="carouselExample" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/slider1.jpg') }}" class="d-block w-100 img-fluid rounded" style="height: 400px; object-fit: cover;" alt="Slider 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slider2.jpg') }}" class="d-block w-100 img-fluid rounded" style="height: 400px; object-fit: cover;" alt="Slider 2">
            </div>
        </div>
    </div>

    <!-- Profiles Section -->
    <div class="container mt-4">
        <h3 class="text-center mb-4">Profiles</h3>
        <div class="row">
            @foreach ($profiles as $profile)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0">
                    <img src="{{ $profile->photo ? asset('storage/' . $profile->photo) : asset('images/default-avatar.png') }}"
                        class="card-img-top img-fluid rounded-top" 
                        style="height: 265px; object-fit: cover;" 
                        alt="{{ $profile->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $profile->name }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
