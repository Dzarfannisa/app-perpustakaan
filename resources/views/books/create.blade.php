@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Form Tambah Buku</h1>
    <form action="#" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection