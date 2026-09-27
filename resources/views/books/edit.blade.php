@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="mb-3">
    <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali ke daftar</a>
</div>

<div class="card shadow-sm p-4">
    <h2 class="h4 text-primary mb-3">Edit Buku</h2>

    @include('partials.alert')

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $book->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author', $book->author) }}">
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection