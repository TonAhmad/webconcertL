<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>elefthéro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/Elefthero-bening.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- navbar section -->
    <div class="container-fluid head">
        <nav class="navbar navbar-expand-lg">
            <div class="container-xxl head2">
                <a class="navbar-brand" href="{{ route('home') }}">Elefthéro</a>
                <img src="{{ asset('images/Elefthero-bening.png') }}" alt="Logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-4">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="/artist"> Artists</a>
                        </li>

                        <li class="nav-item me-4">
                            <a class="nav-link" href="/venue">Venue</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="/ticket">Pricing</a>
                        </li>

                        <!-- Cek apakah user sudah login -->
                        @if (session('user'))
                            <li class="nav-item me-4">
                                <a class="nav-link" href="{{ route('account') }}">Welcome,
                                    {{ session('user')->user_name }}</a>
                            </li>
                            <li class="nav-item me-4">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                        @else
                            <li class="nav-item me-4">
                                <a class="nav-link" href="/signin">Sign In</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @yield('isi')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-logo">
                <img src="{{ asset('images/Elefthero-bening.png') }}" alt="Start Logo" class="logo">
            </div>
            <div class="footer-info">
                <p>&copy; Start, 2024 - All rights reserved.</p>
            </div>
            <div class="social-links">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://whatsapp.com" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

</body>

</html>
