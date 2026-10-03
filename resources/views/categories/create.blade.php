@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <p><a href="{{ route('categories.index') }}" class="btn">&larr; Kembali ke daftar</a></p>

    <div class="card" style="padding: 20px; background: #fff; border-radius: 8px; border: 1px solid #ddd;">
        <h2>Tambah Kategori Baru</h2>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="nama_kategori" style="display: block; margin-bottom: 5px;">Nama Kategori</label>
                <input type="text" 
                       name="nama_kategori" 
                       id="nama_kategori" 
                       value="{{ old('nama_kategori') }}" 
                       required 
                       style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <button type="submit" style="background-color: #0d6efd; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                Simpan
            </button>
        </form>
    </div>
@endsection