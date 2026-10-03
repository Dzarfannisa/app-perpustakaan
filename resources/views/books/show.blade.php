<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Buku</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 600px; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { width: 150px; background: #f3f4f6; }
    </style>
</head>
<body>
    <h1>Detail Buku</h1>
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <table>
        <tr>
            <th>Judul</th>
            <td>{{ $book['title'] }}</td>
        </tr>
        <tr>
            <th>Penulis</th>
            <td>{{ $book['author'] }}</td>
        </tr>
        <tr>
            <th>Kategori</th> {{-- Diperbarui dari ID Kategori --}}
            <td>{{ $book['category']['nama_kategori'] ?? '-' }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $book['stok'] }}</td>
        </tr>
    </table>
</body>
</html>