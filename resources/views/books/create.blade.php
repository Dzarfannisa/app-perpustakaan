@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="mb-3">
    <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">
        &larr; Kembali ke daftar
    </a>
</div>

<div class="card shadow-sm p-4">
    <h2 class="h4 text-primary mb-3">Tambah Buku Baru</h2>

    @include('partials.alert')

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" 
                   class="form-control @error('title') is-invalid @enderror" 
                   id="title" 
                   name="title" 
                   value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" 
                   class="form-control @error('author') is-invalid @enderror" 
                   id="author" 
                   name="author" 
                   value="{{ old('author') }}">
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection