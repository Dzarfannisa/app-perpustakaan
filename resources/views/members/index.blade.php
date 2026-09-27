@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Daftar Anggota</h1>
    <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>
    <p>Ini adalah halaman daftar anggota perpustakaan.</p>
</div>
@endsection