@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<div class="card card-pink mb-4">
    <div class="card-header">
        🌸 Kursus teknologi untuk mahasiswa
    </div>
    <div class="card-body">
        <h1 class="card-title">Belajar lebih terarah bersama KursusKu</h1>
        <p class="card-text">Pilih kursus, cek ketersediaan kursi, lalu isi formulir pendaftaran.</p>
        <a href="{{ route('enrollments.create') }}" class="btn btn-pink">Daftar Kursus</a>
    </div>
</div>

<!-- Daftar Kursus -->
<h2 class="mb-3">Kursus Tersedia</h2>

<table class="table table-bordered table-striped table-pink">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kursus</th>
            <th>Deskripsi</th>
            <th>Kuota</th>
            <th>Terdaftar</th>
            <th>Sisa</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kursus as $index => $item)
            @php
                $sisa = $item->kuota - $item->enrollments_count;
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $item->nama }}</strong></td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->kuota }}</td>
                <td>{{ $item->enrollments_count }}</td>
                <td>
                    @if($sisa > 0)
                        <span class="badge bg-success">{{ $sisa }} kursi</span>
                    @else
                        <span class="badge bg-danger">Penuh</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('enrollments.create') }}" class="btn btn-pink btn-sm">Daftar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada kursus tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection