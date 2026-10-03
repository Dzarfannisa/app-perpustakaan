@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Peminjaman</h2>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->member->nama ?? '-' }}</td>
                    <td>{{ $loan->book->title ?? '-' }}</td>
                    <td>{{ $loan->tanggal_pinjam }}</td>
                    <td>{{ $loan->tanggal_dikembalikan ?? '-' }}</td>
                    <td>
                        @if ($loan->status === 'dikembalikan')
                            <span class="badge badge-dikembalikan">Dikembalikan</span>
                        @elseif ($loan->status === 'dipinjam')
                            <span class="badge badge-dipinjam">Dipinjam</span>
                        @elseif ($loan->status === 'terlambat')
                            <span class="badge badge-terlambat">Terlambat</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($loan->status) }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('loans.show', $loan->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                        
                        @if ($loan->status === 'dipinjam')
                            <form action="{{ route('loans.kembalikan', $loan->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Apakah Anda yakin ingin mengembalikan buku ini?')">Kembalikan</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $loans->links() }}
</div>
@endsection