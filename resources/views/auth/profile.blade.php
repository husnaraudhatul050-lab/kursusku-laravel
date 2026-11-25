<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - KursusKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: #f8f9fa; }
        .navbar-custom {
            background: linear-gradient(135deg, #d63384 0%, #e91e63 100%);
            padding: 16px 0;
        }
        .navbar-brand { color: white !important; font-weight: 700; font-size: 22px; }
        .nav-link-custom { color: rgba(255,255,255,0.9) !important; font-weight: 500; margin-left: 20px; }
        .profile-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .profile-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #d63384, #e91e63);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
            font-weight: 700;
            margin: 0 auto 24px;
        }
        .profile-name {
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 8px;
        }
        .profile-role {
            text-align: center;
            margin-bottom: 32px;
        }
        .role-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            background: #fce4ec;
            color: #d63384;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .info-label {
            color: #6c757d;
            font-size: 14px;
        }
        .info-value {
            font-weight: 500;
            color: #212529;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">📚 KursusKu</a>
            <div class="d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="nav-link-custom">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm ms-2">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <h1 class="profile-name">{{ Auth::user()->name }}</h1>
            <div class="profile-role">
                <span class="role-badge">
                    {{ Auth::user()->is_admin ? '👑 Administrator' : '🎓 Mahasiswa' }}
                </span>
            </div>

            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-value">{{ Auth::user()->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Role</span>
                <span class="info-value">{{ Auth::user()->is_admin ? 'Administrator' : 'Mahasiswa' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Bergabung Sejak</span>
                <span class="info-value">{{ Auth::user()->created_at->format('d M Y') }}</span>
            </div>
        </div>
    </div>
</body>
</html>