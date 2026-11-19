@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')
<div class="container mt-4">

    {{-- Header: judul + subtitle sesuai tampilan lama --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Daftar Kursus</h1>
            <small class="text-muted">Data diambil dari MySQL melalui Eloquent.</small>
        </div>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            + Tambah Kursus
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Search & Filter (fitur dari kode teman) --}}
    <form method="GET" action="{{ route('courses.index') }}" class="row g-2 mb-3">
        <div class="col-md-6">
            <input type="search" id="live-search" name="q" value="{{ $search }}"
                   class="form-control" placeholder="Cari kode atau nama kursus">
        </div>
        <div class="col-md-3">
            <select id="status-filter" name="status" class="form-select">
                <option value="">Semua status</option>
                <option value="open"   @selected($status === 'open')>Open</option>
                <option value="closed" @selected($status === 'closed')>Closed</option>
                <option value="draft"  @selected($status === 'draft')>Draft</option>
                <option value="active" @selected($status === 'active')>Active</option>
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    {{-- Tabel: gaya dikembalikan seperti tampilan lama (header terang, kolom lengkap) --}}
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Biaya</th>
                    <th>Kuota</th>
                    <th>Mulai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $course->code }}</td>
                        <td>{{ $course->name }}</td>
                        <td>Rp{{ number_format($course->biaya, 0, ',', '.') }}</td>
                        <td>{{ $course->kuota }}</td>
                        <td>{{ $course->mulai ? date('d/m/Y', strtotime($course->mulai)) : '-' }}</td>
                        <td>{{ ucfirst($course->status) }}</td>
                        <td>
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-outline-info">Detail</a>
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            Tidak ada kursus yang sesuai dengan pencarian atau filter.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Info jumlah data + Pagination (fitur dari kode teman) --}}
    <div class="d-flex justify-content-between align-items-center mt-3">
        <small class="text-muted">
            Menampilkan {{ $courses->firstItem() ?? 0 }}–{{ $courses->lastItem() ?? 0 }}
            dari {{ $courses->total() }} kursus
        </small>
        {{ $courses->links() }}
    </div>

</div>
@endsection