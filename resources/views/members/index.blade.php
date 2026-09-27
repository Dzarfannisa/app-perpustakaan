@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 text-primary m-0">Daftar Anggota</h2>
        <a href="{{ route('members.create') }}" class="btn btn-primary">+ Tambah Anggota</a>
    </div>

    <!-- Form Pencarian (Search) -->
    <form action="{{ route('members.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama, NIM, atau email..." value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
            @if(request('search'))
                <a href="{{ route('members.index') }}" class="btn btn-outline-secondary">Reset</a>
            @endif
        </div>
    </form>

    @include('partials.alert')

    <div class="table-responsive">
        <table class="table table-striped table-hover border">
            <thead class="table-dark">
                <tr>
                    <th width="50">No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $index => $member)
                <tr>
                    <td>{{ $members->firstItem() + $index }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->nim }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td>{{ $member->alamat }}</td>
                    <td>
                        <span class="badge {{ $member->status == 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $member->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Data anggota tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $members->links() }}
    </div>
</div>
@endsection