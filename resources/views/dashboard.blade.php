<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KursusKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: #fdf8fb; color: #333; }

        /* ===== NAVBAR ===== */
        .navbar-kursusku {
            background: white;
            border-bottom: 1px solid #f1d6e4;
            padding: 12px 0;
            box-shadow: 0 2px 8px rgba(214, 51, 132, 0.05);
        }
        .navbar-brand-custom {
            display: flex; align-items: center; gap: 10px;
            font-weight: 700; font-size: 20px; color: #d63384;
            text-decoration: none;
        }
        .brand-icon {
            width: 36px; height: 36px; background: #d63384;
            border-radius: 8px; color: white;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 18px;
        }
        .nav-menu { display: flex; gap: 8px; align-items: center; }
        .nav-menu a {
            color: #6c757d; text-decoration: none; font-size: 14px;
            padding: 8px 14px; border-radius: 8px; transition: 0.2s;
            font-weight: 500;
        }
        .nav-menu a:hover { background: #fce4ec; color: #d63384; }
        .nav-menu a.active { background: #fce4ec; color: #d63384; font-weight: 600; }
        .user-profile {
            display: flex; align-items: center; gap: 10px;
            margin-left: auto;
        }
        .user-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: #d63384; color: white;
            display: flex; align-items: center; justify-content: center;
            font-weight: 600; font-size: 14px;
        }
        .user-name { font-size: 14px; font-weight: 500; color: #212529; }

        /* ===== CONTAINER ===== */
        .dashboard-main { max-width: 1200px; margin: 0 auto; padding: 32px 20px; }

        /* ===== HEADER ===== */
        .page-label {
            font-size: 11px; font-weight: 600; color: #d63384;
            letter-spacing: 2px; text-transform: uppercase; margin-bottom: 8px;
        }
        .page-title {
            font-size: 26px; font-weight: 700; color: #212529; margin-bottom: 4px;
        }
        .page-subtitle { color: #6c757d; font-size: 14px; margin-bottom: 28px; }

        /* ===== STAT CARDS ===== */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px; margin-bottom: 32px;
        }
        .stat-card {
            background: white; border-radius: 14px; padding: 24px;
            border: 1px solid #f1d6e4; transition: 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(214, 51, 132, 0.1);
        }
        .stat-icon {
            width: 44px; height: 44px; border-radius: 10px;
            background: #fce4ec; color: #d63384;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; margin-bottom: 16px;
        }
        .stat-value {
            font-size: 32px; font-weight: 700; color: #212529;
            margin-bottom: 4px;
        }
        .stat-label { font-size: 13px; color: #6c757d; font-weight: 500; }

        /* ===== ACTIVITY SECTION ===== */
        .activity-card {
            background: white; border-radius: 14px; padding: 24px;
            border: 1px solid #f1d6e4;
        }
        .activity-title {
            font-size: 16px; font-weight: 600; color: #212529;
            margin-bottom: 20px;
        }
        .activity-item {
            display: flex; align-items: center; gap: 14px;
            padding: 14px 16px; background: #fdf2f7;
            border-radius: 10px; margin-bottom: 10px;
        }
        .activity-item:last-child { margin-bottom: 0; }
        .activity-icon {
            width: 36px; height: 36px; border-radius: 50%;
            background: #d63384; color: white;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; flex-shrink: 0;
        }
        .activity-text { flex: 1; font-size: 14px; color: #212529; }
        .activity-text strong { color: #d63384; }
        .activity-time { font-size: 12px; color: #adb5bd; margin-top: 2px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .nav-menu { display: none; }
            .stat-grid { grid-template-columns: 1fr 1fr; }
            .page-title { font-size: 22px; }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar-kursusku">
        <div class="container" style="max-width:1200px;margin:0 auto;display:flex;align-items:center;">
            <a href="{{ route('dashboard') }}" class="navbar-brand-custom">
                <div class="brand-icon">K</div>
                <span>KursusKu</span>
            </a>

            <div class="nav-menu">
                <a href="{{ route('dashboard') }}" class="active">Beranda</a>
                <a href="{{ route('courses.index') }}">Course</a>
                <a href="#">Participant</a>
                <a href="{{ route('enrollments.index') }}">Enrollment</a>
                <a href="{{ route('profile') }}">Akun Staff</a>
            </div>

            <div class="user-profile">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->nama_lengkap ?? auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="user-name">{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="d-inline ms-2">
                    @csrf
                    <button type="submit" class="btn btn-sm" style="color:#d63384;font-size:13px;">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="dashboard-main">

        <!-- Header -->
        <div class="page-label">DASHBOARD</div>
        <h1 class="page-title">Selamat Datang, {{ auth()->user()->nama_lengkap ?? auth()->user()->name }} 👋</h1>
        <p class="page-subtitle">Ringkasan aktivitas pembelajaran Anda hari ini.</p>

        <!-- Stat Cards -->
        <div class="stat-grid">
            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <div class="stat-value">{{ $totalCourses ?? 0 }}</div>
                <div class="stat-label">Total Course</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-value">{{ $totalParticipants ?? 0 }}</div>
                <div class="stat-label">Total Participant</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📝</div>
                <div class="stat-value">{{ $totalEnrollments ?? 0 }}</div>
                <div class="stat-label">Enrollment Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🎯</div>
                <div class="stat-value">{{ $attendanceRate ?? 0 }}%</div>
                <div class="stat-label">Tingkat Kehadiran</div>
            </div>
        </div>

        <!-- Activity Section -->
        <div class="activity-card">
            <div class="activity-title">Aktivitas Terbaru</div>

            @forelse($recentActivities ?? [] as $activity)
            <div class="activity-item">
                <div class="activity-icon">{{ $activity['icon'] ?? '📌' }}</div>
                <div class="activity-text">
                    <div>{{ $activity['text'] }}</div>
                    <div class="activity-time">{{ $activity['time'] ?? 'Baru saja' }}</div>
                </div>
            </div>
            @empty
            <div class="activity-item">
                <div class="activity-icon">📌</div>
                <div class="activity-text">
                    <div>Course baru <strong>"Pemrograman Web"</strong> ditambahkan</div>
                    <div class="activity-time">2 jam yang lalu</div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">👥</div>
                <div class="activity-text">
                    <div>15 mahasiswa baru enrolled ke course <strong>"Basis Data"</strong></div>
                    <div class="activity-time">5 jam yang lalu</div>
                </div>
            </div>
            @endforelse
        </div>

    </div>

</body>
</html>