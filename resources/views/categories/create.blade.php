@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="mb-3">
    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm">
        &larr; Kembali ke daftar
    </a>
</div>

<div class="card shadow-sm p-4">
    <h2 class="h4 text-primary mb-3">Tambah Kategori Baru</h2>

    @include('partials.alert')

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" 
                   class="form-control @error('name') is-invalid @enderror" 
                   id="name" 
                   name="name" 
                   value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection