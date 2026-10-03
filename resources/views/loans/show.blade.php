@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Peminjaman</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Transaksi ID: #{{ $loan->id }}</h5>
            <hr>
            <p><strong>Nama Anggota:</strong> {{ $loan->member->nama ?? '-' }}</p>
            <p><strong>Judul Buku:</strong> {{ $loan->book->title ?? '-' }}</p>
            <p><strong>Tanggal Pinjam:</strong> {{ $loan->tanggal_pinjam }}</p>
            <p><strong>Tanggal Dikembalikan:</strong> {{ $loan->tanggal_dikembalikan ?? '-' }}</p>
            <p>
                <strong>Status:</strong>
                @if ($loan->status === 'dikembalikan')
                    <span class="badge badge-dikembalikan">Dikembalikan</span>
                @elseif ($loan->status === 'dipinjam')
                    <span class="badge badge-dipinjam">Dipinjam</span>
                @elseif ($loan->status === 'terlambat')
                    <span class="badge badge-terlambat">Terlambat</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($loan->status) }}</span>
                @endif
            </p>

            <a href="{{ route('loans.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection