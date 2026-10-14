<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS Badge & Navbar User -->
    <style>
        .badge-dikembalikan {
            background-color: #198754; /* Hijau */
            color: #fff;
        }

        .badge-dipinjam {
            background-color: #ffc107; /* Kuning / Oranye */
            color: #000;
        }

        .badge-terlambat {
            background-color: #dc3545; /* Merah */
            color: #fff;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            font-size: 14px;
        }

        .btn-logout {
            background: none;
            border: 1px solid #fff;
            color: #fff;
            padding: 4px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-logout:hover {
            background: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Perpustakaan Digital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                    <div class="navbar-nav me-auto">
                        <a class="nav-link text-white {{ request()->routeIs('books.*') ? 'fw-bold active' : '' }}" href="{{ route('books.index') }}">Buku</a>
                        @if (auth()->user()->role === 'admin')
                            <a class="nav-link text-white {{ request()->routeIs('categories.*') ? 'fw-bold active' : '' }}" href="{{ route('categories.index') }}">Kategori</a>
                        @endif
                        <a class="nav-link text-white {{ request()->routeIs('members.*') ? 'fw-bold active' : '' }}" href="{{ route('members.index') }}">Anggota</a>
                        <a class="nav-link text-white {{ request()->routeIs('loans.*') ? 'fw-bold active' : '' }}" href="{{ route('loans.index') }}">Peminjaman</a>
                        <a class="nav-link text-white {{ request()->routeIs('profile.*') ? 'fw-bold active' : '' }}" href="{{ route('profile.show') }}">Profil</a>
                    </div>
                    <div class="navbar-user ms-auto">
                        <span>{{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-logout">Logout</button>
                        </form>
                    </div>
                @endauth
                @guest
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container my-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} Perpustakaan Digital - D4 Teknik Informatika</p>
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>