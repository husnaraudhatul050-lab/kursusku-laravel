@extends('layouts.app')

@section('title', 'Daftar Enrollment')

@section('content')
<div class="container mt-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Daftar Enrollment</h1>
            <small class="text-muted">Data diambil dari MySQL melalui Eloquent.</small>
        </div>
        <a href="{{ route('enrollments.create') }}" class="btn btn-primary">
            + Tambah Enrollment
        </a>
    </div>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Search & Filter --}}
    <form method="GET" action="{{ route('enrollments.index') }}" class="row g-2 mb-3">
        <div class="col-md-5">
            <input type="search" id="live-search" name="q" value="{{ $search }}"
                   class="form-control" placeholder="Cari nama mahasiswa atau course">
        </div>
        <div class="col-md-3">
            <select id="status-filter" name="status" class="form-select">
                <option value="">Semua status</option>
                <option value="Aktif"      @selected($status === 'Aktif')>Aktif</option>
                <option value="Selesai"    @selected($status === 'Selesai')>Selesai</option>
                <option value="Dibatalkan" @selected($status === 'Dibatalkan')>Dibatalkan</option>
            </select>
        </div>
        <div class="col-md-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="{{ route('enrollments.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Mahasiswa</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->id }}</td>
                        <td>{{ $enrollment->course->name ?? '-' }}</td>
                        <td>{{ $enrollment->user->name ?? '-' }}</td>
                        <td>{{ $enrollment->created_at ? $enrollment->created_at->format('d/m/Y') : '-' }}</td>
                        <td>
                            <span class="badge
                                @if($enrollment->status === 'Aktif') bg-success
                                @elseif($enrollment->status === 'Selesai') bg-info
                                @elseif($enrollment->status === 'Dibatalkan') bg-danger
                                @else bg-secondary
                                @endif">
                                {{ $enrollment->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('enrollments.show', $enrollment) }}"
                               class="btn btn-sm btn-outline-info">Detail</a>
                            <a href="{{ route('enrollments.edit', $enrollment) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('enrollments.destroy', $enrollment) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus enrollment ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Tidak ada enrollment yang sesuai dengan pencarian atau filter.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Info + Pagination --}}
    <div class="d-flex justify-content-between align-items-center mt-3">
        <small class="text-muted">
            Menampilkan {{ $enrollments->firstItem() ?? 0 }}–{{ $enrollments->lastItem() ?? 0 }}
            dari {{ $enrollments->total() }} enrollment
        </small>
        {{ $enrollments->links() }}
    </div>

</div>
@endsection