@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 text-primary m-0">Daftar Buku</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Buku Baru</a>
    </div>

    @include('partials.alert')

    <div class="table-responsive">
        <table class="table table-striped table-hover border">
            <thead class="table-dark">
                <tr>
                    <th width="50">No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $index => $book)
                <tr>
                    <td>{{ $books->firstItem() + $index }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <span class="badge bg-secondary">
                            {{ $book->category ? $book->category->name : 'Tanpa Kategori' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data buku.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $books->links() }}
    </div>
</div>
@endsection