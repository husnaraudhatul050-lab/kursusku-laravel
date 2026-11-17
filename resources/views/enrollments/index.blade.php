<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Enrollment - KursusKu</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Arial, sans-serif; }
        body { background: #fff5f8; color: #333; min-height: 100vh; }
        .navbar { background: #c2185b; color: white; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .navbar h2 { font-size: 22px; font-weight: 600; }
        .navbar a { color: white; text-decoration: none; margin-left: 25px; font-size: 15px; }
        .navbar a:hover { text-decoration: underline; }
        .container { max-width: 1000px; margin: 40px auto; padding: 0 20px; }
        .page-title { color: #880e4f; margin-bottom: 25px; font-size: 26px; border-bottom: 2px solid #f8bbd0; padding-bottom: 10px; }
        .alert-success { background: #fce4ec; color: #880e4f; padding: 15px 20px; border-left: 5px solid #d81b60; border-radius: 4px; margin-bottom: 25px; font-weight: 500; }
        .btn-add { display: inline-block; background: #ec407a; color: white; padding: 12px 25px; text-decoration: none; border-radius: 6px; font-weight: bold; margin-bottom: 25px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn-add:hover { background: #d81b60; }
        .card { background: white; border-radius: 10px; padding: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        thead { background: #d81b60; color: white; }
        th { padding: 16px 20px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; }
        td { padding: 16px 20px; border-bottom: 1px solid #fce4ec; color: #444; font-size: 15px; }
        tbody tr:nth-child(even) { background: #fffafc; }
        tbody tr:hover { background: #fce4ec; transition: background 0.2s; }
        .badge { background: #f8bbd0; color: #880e4f; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: bold; display: inline-block; }
        .empty { text-align: center; padding: 40px; color: #ad1457; font-style: italic; font-size: 16px; }
    </style>
</head>
<body>

    <div class="navbar">
        <h2>🌸 KursusKu</h2>
        <div>
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ route('courses.index') }}">Daftar Course</a>
            <a href="{{ route('enrollments.index') }}">Enrollment</a>
        </div>
    </div>

    <div class="container">

        <h1 class="page-title">📋 Laporan Enrollment</h1>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <a href="{{ route('enrollments.create') }}" class="btn-add">+ Tambah Enrollment</a>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 30%;">Participant</th>
                        <th style="width: 30%;">Course</th>
                        <th style="width: 20%;">Start Date</th>
                        <th style="width: 15%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enrollments as $index => $enrollment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $enrollment->participant->name }}</td>
                            <td>{{ $enrollment->course->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($enrollment->course->start_date)->format('d M Y') }}</td>
                            <td><span class="badge">{{ ucfirst($enrollment->status) }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">Belum ada enrollment. Silakan tambah data baru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>