@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 text-primary m-0">Daftar Buku</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Buku Baru</a>
    </div>

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
                <tr>
                    <td>1</td>
                    <td>Pemrograman Laravel 12</td>
                    <td>Dzarfannisa</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection