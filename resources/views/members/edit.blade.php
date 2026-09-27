@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
<div class="mb-3">
    <a href="{{ route('members.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali ke daftar</a>
</div>

<div class="card shadow-sm p-4">
    <h2 class="h4 text-primary mb-3">Edit Anggota</h2>

    @include('partials.alert')

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $member->nama) }}">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $member->nim) }}">
            @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $member->email) }}">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $member->nomor_telepon) }}">
            @error('nomor_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $member->alamat) }}</textarea>
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                <option value="Aktif" {{ old('status', $member->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Non-Aktif" {{ old('status', $member->status) == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection