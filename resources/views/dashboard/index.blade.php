<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KurusKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        magenta: {
                            50: '#fdf2f8', 100: '#fce7f3', 200: '#fbcfe8',
                            300: '#f9a8d4', 400: '#f472b6', 500: '#ec4899',
                            600: '#db2777', 700: '#be185d', 800: '#9d174d', 900: '#831843'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-magenta-50/50 min-h-screen font-sans">

<nav class="bg-white border-b border-magenta-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-10">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-magenta-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">K</span>
                    </div>
                    <span class="text-xl font-bold text-gray-900">KurusKu</span>
                </a>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-medium text-magenta-600 bg-magenta-50 rounded-lg">Beranda</a>
                    <a href="{{ route('course') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-magenta-600 hover:bg-magenta-50 rounded-lg">Course</a>
                    <a href="{{ route('participant') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-magenta-600 hover:bg-magenta-50 rounded-lg">Participant</a>
                    <a href="{{ route('enrollment') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-magenta-600 hover:bg-magenta-50 rounded-lg">Enrollment</a>
                    <a href="{{ route('akun-staff') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-magenta-600 hover:bg-magenta-50 rounded-lg">Akun Staff</a>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-9 h-9 bg-magenta-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-sm">{{ substr($user->nama_lengkap ?? 'A', 0, 1) }}</span>
                </div>
                <span class="text-sm font-semibold text-gray-800">{{ $user->nama_lengkap ?? 'Admin' }}</span>
            </div>
        </div>
    </div>
</nav>

<main class="max-w-7xl mx-auto px-6 py-10">
    <div class="mb-8">
        <p class="text-xs font-bold tracking-[0.2em] text-magenta-600 uppercase mb-2">Dashboard</p>
        <h1 class="text-3xl font-bold text-gray-900">Selamat Datang, {{ $user->nama_lengkap ?? 'Admin' }} 👋</h1>
        <p class="text-sm text-gray-500 mt-1">Ringkasan aktivitas pembelajaran Anda hari ini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl border border-magenta-100 p-6 shadow-sm">
            <div class="w-12 h-12 bg-magenta-100 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-magenta-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900">24</h3>
            <p class="text-sm text-gray-500">Total Course</p>
        </div>
        <div class="bg-white rounded-2xl border border-magenta-100 p-6 shadow-sm">
            <div class="w-12 h-12 bg-magenta-100 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-magenta-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900">156</h3>
            <p class="text-sm text-gray-500">Total Participant</p>
        </div>
        <div class="bg-white rounded-2xl border border-magenta-100 p-6 shadow-sm">
            <div class="w-12 h-12 bg-magenta-100 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-magenta-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900">89</h3>
            <p class="text-sm text-gray-500">Enrollment Aktif</p>
        </div>
        <div class="bg-white rounded-2xl border border-magenta-100 p-6 shadow-sm">
            <div class="w-12 h-12 bg-magenta-100 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-magenta-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900">98%</h3>
            <p class="text-sm text-gray-500">Tingkat Kehadiran</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-magenta-100 p-6 shadow-sm">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Aktivitas Terbaru</h3>
        <div class="space-y-4">
            <div class="flex items-center space-x-4 p-4 bg-magenta-50/50 rounded-lg">
                <div class="w-10 h-10 bg-magenta-500 rounded-full flex items-center justify-center text-white text-lg">+</div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Course baru "Pemrograman Web" ditambahkan</p>
                    <p class="text-xs text-gray-500">2 jam yang lalu</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-magenta-50/50 rounded-lg">
                <div class="w-10 h-10 bg-magenta-400 rounded-full flex items-center justify-center text-white text-lg">👥</div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">15 mahasiswa baru enrolled ke course "Basis Data"</p>
                    <p class="text-xs text-gray-500">5 jam yang lalu</p>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>