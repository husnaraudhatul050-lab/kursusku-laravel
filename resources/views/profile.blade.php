<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - KursusKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: #f8f9fa; }
        .navbar-custom {
            background: linear-gradient(135deg, #d63384 0%, #e91e63 100%);
            padding: 16px 0;
            box-shadow: 0 4px 12px rgba(214, 51, 132, 0.15);
        }
        .navbar-brand { color: white !important; font-weight: 700; font-size: 22px; }
        .nav-link-custom { color: rgba(255,255,255,0.9) !important; font-weight: 500; margin-left: 20px; transition: 0.3s; }
        .nav-link-custom:hover { color: white !important; }

        .profile-container { max-width: 900px; margin: 40px auto; padding: 0 20px; }

        /* Avatar Section */
        .profile-header {
            background: white; border-radius: 16px; padding: 40px 32px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04); text-align: center;
            border-top: 5px solid #d63384; margin-bottom: 24px;
        }
        .profile-avatar {
            width: 110px; height: 110px; border-radius: 50%;
            background: linear-gradient(135deg, #d63384, #e91e63);
            color: white; display: flex; align-items: center; justify-content: center;
            font-size: 44px; font-weight: 700; margin: 0 auto 16px;
            box-shadow: 0 8px 20px rgba(214, 51, 132, 0.3);
        }
        .profile-name { font-size: 26px; font-weight: 700; color: #212529; margin-bottom: 6px; }
        .profile-email { color: #6c757d; font-size: 14px; margin-bottom: 12px; }
        .role-badge {
            display: inline-block; padding: 6px 18px; border-radius: 20px;
            font-size: 13px; font-weight: 600;
        }
        .role-admin { background: #fce4ec; color: #d63384; }
        .role-user { background: #e3f2fd; color: #1976d2; }
        .status-badge {
            display: inline-block; padding: 4px 14px; border-radius: 20px;
            font-size: 12px; font-weight: 600; background: #e8f5e9; color: #198754;
            margin-left: 8px;
        }

        /* Info Cards */
        .info-card {
            background: white; border-radius: 16px; padding: 28px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04); margin-bottom: 20px;
        }
        .info-card-title {
            font-size: 16px; font-weight: 600; color: #d63384;
            margin-bottom: 20px; padding-bottom: 10px;
            border-bottom: 2px solid #fce4ec;
        }
        .info-row {
            display: flex; justify-content: space-between; align-items: center;
            padding: 14px 0; border-bottom: 1px solid #f1f3f5;
        }
        .info-row:last-child { border-bottom: none; }
        .info-label { color: #6c757d; font-size: 14px; font-weight: 500; }
        .info-value { color: #212529; font-weight: 600; font-size: 14px; }
        .info-value.empty { color: #adb5bd; font-style: italic; }

        .btn-back {
            background: linear-gradient(135deg, #d63384, #e91e63);
            color: white; border: none; padding: 10px 24px; border-radius: 10px;
            font-weight: 500; text-decoration: none; display: inline-block;
            transition: 0.3s;
        }
        .btn-back:hover { transform: translateY(-2px); color: white; box-shadow: 0 8px 20px rgba(214, 51, 132, 0.3); }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">📚 KursusKu</a>
            <div class="d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="nav-link-custom">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline ms-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="profile-container">
        <!-- Header Profil -->
        <div class="profile-header">
            <div class="profile-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <h1 class="profile-name">{{ auth()->user()->name }}</h1>
            <p class="profile-email">{{ auth()->user()->email }}</p>
            <div>
                <span class="role-badge {{ auth()->user()->role === 'admin' ? 'role-admin' : 'role-user' }}">
                    {{ auth()->user()->role === 'admin' ? '👑 Administrator' : '🎓 ' . ucfirst(auth()->user()->role) }}
                </span>
                @if(auth()->user()->status)
                <span class="status-badge">● {{ auth()->user()->status }}</span>
                @endif
            </div>
        </div>

        <!-- Informasi Akun -->
        <div class="info-card">
            <h5 class="info-card-title">🔐 Informasi Akun</h5>
            <div class="info-row">
                <span class="info-label">Username</span>
                <span class="info-value">{{ auth()->user()->username ?? '-' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Nama Lengkap</span>
                <span class="info-value">{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-value">{{ auth()->user()->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Role</span>
                <span class="info-value">{{ ucfirst(auth()->user()->role ?? '-') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Status</span>
                <span class="info-value">{{ auth()->user()->status ?? '-' }}</span>
            </div>
        </div>

        <!-- Informasi Pribadi -->
        <div class="info-card">
            <h5 class="info-card-title">👤 Informasi Pribadi</h5>
            <div class="info-row">
                <span class="info-label">Nomor HP</span>
                <span class="info-value {{ !auth()->user()->nomor_hp ? 'empty' : '' }}">
                    {{ auth()->user()->nomor_hp ?? 'Belum diisi' }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Jabatan</span>
                <span class="info-value {{ !auth()->user()->jabatan ? 'empty' : '' }}">
                    {{ auth()->user()->jabatan ?? 'Belum diisi' }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Instansi</span>
                <span class="info-value {{ !auth()->user()->instansi ? 'empty' : '' }}">
                    {{ auth()->user()->instansi ?? 'Belum diisi' }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Alamat</span>
                <span class="info-value {{ !auth()->user()->alamat ? 'empty' : '' }}">
                    {{ auth()->user()->alamat ?? 'Belum diisi' }}
                </span>
            </div>
        </div>

        <!-- Informasi Sistem -->
        <div class="info-card">
            <h5 class="info-card-title">⚙️ Informasi Sistem</h5>
            <div class="info-row">
                <span class="info-label">Terdaftar Sejak</span>
                <span class="info-value">{{ auth()->user()->created_at ? auth()->user()->created_at->format('d M Y, H:i') : '-' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Login Terakhir</span>
                <span class="info-value {{ !auth()->user()->last_login ? 'empty' : '' }}">
                    {{ auth()->user()->last_login ? \Carbon\Carbon::parse(auth()->user()->last_login)->format('d M Y, H:i') : 'Belum pernah' }}
                </span>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-center mt-4 mb-5">
            <a href="{{ route('dashboard') }}" class="btn-back">← Kembali ke Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>