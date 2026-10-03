<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS Badge untuk Status Transaksi -->
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
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Perpustakaan Digital</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white me-3" href="{{ url('/') }}">Home</a>
                <a class="nav-link text-white me-3" href="{{ route('books.index') }}">Daftar Buku</a>
                <a class="nav-link text-white me-3" href="{{ route('members.index') }}">Daftar Anggota</a>
                <a class="nav-link text-white" href="{{ route('loans.index') }}">Peminjaman</a>
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