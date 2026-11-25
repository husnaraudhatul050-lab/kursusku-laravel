<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KursusKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { margin: 0; padding: 0; min-height: 100vh; }
        .login-container { display: flex; min-height: 100vh; }

        /* ===== SISI KIRI: BRANDING ===== */
        .login-left {
            flex: 1;
            background: linear-gradient(135deg, #d63384 0%, #e91e63 50%, #c2185b 100%);
            color: white; padding: 60px;
            display: flex; flex-direction: column; justify-content: space-between;
            position: relative; overflow: hidden;
        }
        .login-left::before {
            content: ''; position: absolute; top: -50%; right: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        }
        .login-left-content { position: relative; z-index: 1; }
        .brand-logo { display: flex; align-items: center; gap: 12px; margin-bottom: 40px; }
        .brand-logo-icon {
            width: 48px; height: 48px; background: white; border-radius: 12px;
            display: flex; align-items: center; justify-content: center; font-size: 24px;
        }
        .brand-logo-text { font-size: 24px; font-weight: 700; }
        .workspace-label {
            font-size: 12px; letter-spacing: 2px; opacity: 0.8;
            margin-bottom: 20px; text-transform: uppercase;
        }
        .hero-title { font-size: 56px; font-weight: 700; line-height: 1.1; margin-bottom: 24px; }
        .hero-title .highlight { color: #ffeb3b; }
        .hero-subtitle { font-size: 16px; opacity: 0.9; line-height: 1.6; max-width: 400px; }
        .dashboard-preview {
            background: rgba(255,255,255,0.15); backdrop-filter: blur(10px);
            border-radius: 16px; padding: 24px; margin-top: 40px;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .preview-header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 16px; font-size: 12px; font-weight: 600; letter-spacing: 1px;
        }
        .preview-item {
            background: rgba(255,255,255,0.1); border-radius: 8px;
            padding: 12px 16px; margin-bottom: 8px; display: flex; align-items: center; gap: 12px;
        }
        .preview-icon {
            width: 32px; height: 32px; background: rgba(255,255,255,0.2);
            border-radius: 8px; display: flex; align-items: center; justify-content: center;
        }

        /* ===== SISI KANAN: FORM ===== */
        .login-right {
            flex: 1; background: #fafafa; padding: 60px;
            display: flex; flex-direction: column; justify-content: center; position: relative;
        }
        .back-link  { position: absolute; top: 30px; left: 30px; color: #666; text-decoration: none; font-size: 14px; }
        .portal-link{ position: absolute; top: 30px; right: 30px; color: #d63384; text-decoration: none; font-size: 14px; font-weight: 500; }
        .login-form-container { max-width: 420px; margin: 0 auto; width: 100%; }
        .role-badge {
            display: inline-block; background: #fce4ec; color: #d63384;
            padding: 6px 14px; border-radius: 20px; font-size: 11px; font-weight: 600;
            letter-spacing: 1px; margin-bottom: 16px; text-transform: uppercase;
        }
        .welcome-title { font-size: 36px; font-weight: 700; color: #212529; margin-bottom: 8px; }
        .welcome-subtitle { color: #6c757d; font-size: 14px; margin-bottom: 32px; }
        .form-label-custom { font-size: 14px; font-weight: 500; color: #212529; margin-bottom: 8px; }
        .input-group-custom { position: relative; margin-bottom: 20px; }
        .input-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #adb5bd; }
        .form-control-custom {
            width: 100%; padding: 14px 16px 14px 44px; border: 1px solid #dee2e6;
            border-radius: 10px; font-size: 14px; transition: all 0.3s; background: white;
        }
        .form-control-custom:focus {
            outline: none; border-color: #d63384;
            box-shadow: 0 0 0 3px rgba(214, 51, 132, 0.1);
        }
        .toggle-password {
            position: absolute; right: 16px; top: 50%; transform: translateY(-50%);
            background: none; border: none; color: #d63384; font-size: 13px;
            font-weight: 500; cursor: pointer;
        }
        .btn-login {
            width: 100%; padding: 14px;
            background: linear-gradient(135deg, #d63384 0%, #e91e63 100%);
            color: white; border: none; border-radius: 10px; font-size: 15px;
            font-weight: 600; cursor: pointer; transition: all 0.3s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #c2185b 0%, #d81b60 100%);
            transform: translateY(-2px); box-shadow: 0 8px 20px rgba(214, 51, 132, 0.3);
        }
        .forgot-link {
            display: block; text-align: center; margin-top: 16px;
            color: #adb5bd; text-decoration: none; font-size: 13px;
        }
        .forgot-link:hover { color: #d63384; }
        .remember-me { display: flex; align-items: center; gap: 8px; margin-bottom: 20px; font-size: 13px; color: #6c757d; }
        .remember-me input { accent-color: #d63384; }
        .staff-account {
            margin-top: 32px; padding: 16px; background: white;
            border-radius: 10px; border: 1px solid #e9ecef;
        }
        .staff-header { display: flex; align-items: center; gap: 12px; }
        .staff-icon {
            width: 36px; height: 36px; background: #fce4ec; border-radius: 8px;
            display: flex; align-items: center; justify-content: center; color: #d63384;
        }
        .staff-title { font-weight: 600; color: #212529; font-size: 14px; }
        .staff-subtitle { font-size: 12px; color: #6c757d; }
        .alert-custom {
            background: #fce4ec; color: #c2185b; border: 1px solid #f8bbd0;
            border-radius: 10px; padding: 12px 16px; font-size: 13px; margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .login-left { display: none; }
            .login-right { padding: 30px; }
        }
    </style>
</head>
<body>
    <div class="login-container">

        <!-- ===== SISI KIRI: BRANDING ===== -->
        <div class="login-left">
            <div class="login-left-content">
                <div class="brand-logo">
                    <div class="brand-logo-icon">📚</div>
                    <div class="brand-logo-text">KursusKu</div>
                </div>

                <div class="workspace-label">WORKSPACE AKADEMIK</div>

                <h1 class="hero-title">
                    Setiap kelas.<br>
                    Setiap progres.<br>
                    <span class="highlight">Lebih terarah.</span>
                </h1>

                <p class="hero-subtitle">
                    Kelola presensi, tugas, nilai, dan perkembangan mahasiswa
                    melalui dashboard yang terintegrasi.
                </p>

                <div class="dashboard-preview">
                    <div class="preview-header">
                        <span>📊 RINGKASAN KELAS</span>
                        <span>+ Tambah</span>
                    </div>
                    <div class="preview-item">
                        <div class="preview-icon">✅</div>
                        <div>
                            <div style="font-weight:600;font-size:14px;">Presensi QR</div>
                            <div style="font-size:11px;opacity:0.8;">Rekap absensi presensi</div>
                        </div>
                    </div>
                    <div class="preview-item">
                        <div class="preview-icon">📝</div>
                        <div>
                            <div style="font-weight:600;font-size:14px;">Nilai dan Tugas</div>
                            <div style="font-size:11px;opacity:0.8;">Monitoring kelas pada dashboard</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== SISI KANAN: FORM LOGIN ===== -->
        <div class="login-right">
            <a href="{{ route('home') }}" class="back-link">← Kembali ke Beranda</a>
            <a href="#" class="portal-link">Portal Mahasiswa ↗</a>

            <div class="login-form-container">
                <div class="role-badge">AKSES ADMINISTRATOR & DOSEN</div>
                <h2 class="welcome-title">Selamat datang 👋</h2>
                <p class="welcome-subtitle">
                    Masuk ke dashboard Anda untuk mengelola aktivitas pembelajaran.
                </p>

                {{-- Pesan sukses (misal dari forgot password) --}}
                @if(session('status'))
                    <div class="alert-custom">{{ session('status') }}</div>
                @endif

                {{-- Pesan error validasi --}}
                @if($errors->any())
                    <div class="alert-custom">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('login.attempt') }}">
                    @csrf

                    <!-- Username / Email -->
                    <label class="form-label-custom">Username</label>
                    <div class="input-group-custom">
                        <span class="input-icon">👤</span>
                        <input type="email" name="email" class="form-control-custom"
                               placeholder="Masukkan username"
                               value="{{ old('email') }}" required autofocus>
                    </div>

                    <!-- Password + Toggle Lihat/Sembunyikan -->
                    <label class="form-label-custom">Password</label>
                    <div class="input-group-custom">
                        <span class="input-icon">🔒</span>
                        <input type="password" id="password" name="password"
                               class="form-control-custom"
                               placeholder="Masukkan password" required>
                        <button type="button" id="togglePassword" class="toggle-password">
                            Lihat
                        </button>
                    </div>

                    <!-- Remember Me -->
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Ingat saya</label>
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="btn-login">
                        Masuk ke Dashboard →
                    </button>

                    <!-- Lupa Password -->
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        Lupa password?
                    </a>
                </form>

                {{-- CATATAN: Link "Daftar sekarang" DIHAPUS karena
                     sesuai slide UAS, fitur register TIDAK diminta.
                     Ini juga mencegah error "Route [register] not defined". --}}

                <!-- Info akun mahasiswa (statis) -->
                <div class="staff-account">
                    <div class="staff-header">
                        <div class="staff-icon">🎓</div>
                        <div>
                            <div class="staff-title">Mahasiswa</div>
                            <div class="staff-subtitle">
                                Masuk sebagai mahasiswa untuk melihat progres & presensi QR
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fitur Hide / Show Password
        document.getElementById('togglePassword').addEventListener('click', function () {
            const input = document.getElementById('password');
            if (input.type === 'password') {
                input.type = 'text';
                this.textContent = 'Sembunyikan';
            } else {
                input.type = 'password';
                this.textContent = 'Lihat';
            }
        });
    </script>
</body>
</html>