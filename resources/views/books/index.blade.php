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
                </tr>
            </thead>
            <tbody>
                @forelse($books as $index => $book)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada data buku.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection