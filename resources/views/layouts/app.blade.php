<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Perpustakaan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header / Navbar -->
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Perpustakaan Digital</h1>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline">Home</a></li>
                <li><a href="/buku" class="hover:underline">Daftar Buku</a></li>
            </ul>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="container mx-auto flex-1 p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; {{ date('Y') }} Perpustakaan Digital - D4 Teknik Informatika</p>
    </footer>

</body>
</html>