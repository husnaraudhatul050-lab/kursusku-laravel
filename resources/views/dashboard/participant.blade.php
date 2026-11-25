<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Participant - KurusKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{colors:{magenta:{50:'#fdf2f8',100:'#fce7f3',200:'#fbcfe8',300:'#f9a8d4',400:'#f472b6',500:'#ec4899',600:'#db2777',700:'#be185d',800:'#9d174d',900:'#831843'}}}}}</script>
</head>
<body class="bg-magenta-50/50 min-h-screen font-sans">
<nav class="bg-white border-b border-magenta-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-10">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-magenta-600 rounded-lg flex items-center justify-center"><span class="text-white font-bold text-lg">K</span></div>
                    <span class="text-xl font-bold text-gray-900">KurusKu</span>
                </a>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-magenta-600 hover:bg-magenta-50 rounded-lg">Beranda</a>
                    <a href="{{ route('course') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-magenta-600 hover:bg-magenta-50 rounded-lg">Course</a>
                    <a href="{{ route('participant') }}" class="px-4 py-2 text-sm font-medium text-magenta-600 bg-magenta-50 rounded-lg">Participant</a>
                    <a href="{{ route('enrollment') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-magenta-600 hover:bg-magenta-50 rounded-lg">Enrollment</a>
                    <a href="{{ route('akun-staff') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-magenta-600 hover:bg-magenta-50 rounded-lg">Akun Staff</a>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-9 h-9 bg-magenta-600 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">{{ substr($user->nama_lengkap ?? 'A', 0, 1) }}</span></div>
                <span class="text-sm font-semibold text-gray-800">{{ $user->nama_lengkap ?? 'Admin' }}</span>
            </div>
        </div>
    </div>
</nav>
<main class="max-w-7xl mx-auto px-6 py-10">
    <div class="mb-8">
        <p class="text-xs font-bold tracking-[0.2em] text-magenta-600 uppercase mb-2">Participant Management</p>
        <h1 class="text-3xl font-bold text-gray-900">Daftar Peserta</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola semua peserta dan mahasiswa yang terdaftar.</p>
    </div>
    <div class="bg-white rounded-2xl border border-magenta-100 shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-magenta-50 border-b border-magenta-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-magenta-700 uppercase">No</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-magenta-700 uppercase">Nama</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-magenta-700 uppercase">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-magenta-700 uppercase">Role</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-magenta-700 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-magenta-50">
                @for($i = 1; $i <= 10; $i++)
                <tr class="hover:bg-magenta-50/30 transition">
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $i }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-magenta-100 rounded-full flex items-center justify-center"><span class="text-xs font-bold text-magenta-600">{{ chr(64 + $i) }}</span></div>
                            <span class="text-sm font-medium text-gray-900">Mahasiswa {{ $i }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">mahasiswa{{ $i }}@kurusku.test</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Mahasiswa</td>
                    <td class="px-6 py-4"><span class="bg-magenta-500 text-white text-xs font-bold px-3 py-1 rounded-full">Aktif</span></td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</main>
</body>
</html>