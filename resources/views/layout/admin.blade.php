<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Elefthéro</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin/dashboard">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="/admin/dashboard">Dashboard</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#">Selling Data</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="/admin/ticket">Ticket Data</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#">Activity Log</a></li> --}}
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- Jika admin login -->
                    @if (session('admin'))
                        <li class="nav-item">
                            <span class="nav-link">Welcome, {{ session('admin')->username }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                        </li>
                    @else
                        <!-- Jika belum login -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    @yield('admin')

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Admin Penjualan Tiket Konser. All rights reserved.</p>
    </footer>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
