@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h3 mb-3">Pendaftaran Kursus</h1>
                <p class="text-secondary">Pilih kursus. Jumlah kursi akan dicek tanpa reload halaman.</p>

                <form method="POST" action="{{ route('enrollments.preview') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Pilih Kursus</label>
                        <select id="course_id" name="course_id" class="form-select" required>
                            <option value="">-- pilih kursus --</option>
                            @foreach($courses as $id => $course)
                                <option value="{{ $id }}" @selected(old('course_id') == $id)>
                                    {{ $course['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                 
<!-- aria-live="polite" sudah sangat bagus untuk aksesibilitas (screen reader) -->
<div id="availability" class="alert alert-secondary my-3 transition-all" aria-live="polite">
    Pilih kursus untuk melihat sisa kursi melalui Ajax.
</div>

<!-- Submit Button -->
<!-- Ditambahkan id="submit-btn" agar bisa dikontrol via JavaScript (misal: disable jika kursi habis) -->
<button type="submit" id="submit-btn" class="btn-red w-100 py-3 fs-6 mt-3 shadow-sm d-flex align-items-center justify-content-center">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
        <circle cx="8.5" cy="7" r="4"></circle>
        <line x1="20" y1="8" x2="20" y2="14"></line>
        <line x1="23" y1="11" x2="17" y2="11"></line>
    </svg>
    <span id="submit-btn-text">Daftar Sekarang</span>
</button>


                </form>
            </div>
        </div>
    </div>
</div>
@endsection