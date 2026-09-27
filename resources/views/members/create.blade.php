@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Anggota</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="#" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection