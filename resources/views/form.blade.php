@extends('layouts.app')

@section('title', 'Form Pendaftaran - KursusKu')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h3 mb-4">Form Pendaftaran Kursus</h1>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('form.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input
                                type="text"
                                class="form-control"
                                id="nama"
                                name="nama"
                                placeholder="Masukkan nama lengkap"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Masukkan email"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="kursus" class="form-label">Pilihan Kursus</label>
                            <select
                                class="form-select"
                                id="kursus"
                                name="kursus"
                                required
                            >
                                <option value="">Pilih kursus</option>
                                <option value="web">Web Development</option>
                                <option value="desain">Desain Grafis</option>
                                <option value="database">Database</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Daftar Sekarang
                        </button>

                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                            Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection