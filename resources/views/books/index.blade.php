@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Daftar Buku</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku Baru</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pemrograman Laravel 12</td>
                <td>Dzarfannisa</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection