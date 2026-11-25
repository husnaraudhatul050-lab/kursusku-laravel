<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course - KurusKu</title>
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
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-magenta-600 hover:bg-magenta-50 rounded-lg">Beranda</a>
                    <a href="{{ route('course') }}" class="px-4 py-2 text-sm font-medium text-magenta-600 bg-magenta-50 rounded-lg">Course</a>
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
        <p class="text-xs font-bold tracking-[0.2em] text-magenta-600 uppercase mb-2">Course Management</p>
        <h1 class="text-3xl font-bold text-gray-900">Daftar Course</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola semua course dan materi pembelajaran.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @for($i = 1; $i <= 6; $i++)
        <div class="bg-white rounded-2xl border border-magenta-100 overflow-hidden shadow-sm hover:shadow-md transition">
            <div class="h-32 bg-gradient-to-br from-magenta-400 to-magenta-600 flex items-center justify-center">
                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Course {{ $i }}</h3>
                <p class="text-sm text-gray-500 mb-4">Deskripsi singkat tentang course ini dan materi yang diajarkan.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-400">24 Peserta</span>
                    <button class="text-sm font-medium text-magenta-600 hover:text-magenta-700">Lihat Detail →</button>
                </div>
            </div>
        </div>
        @endfor
    </div>
</main>

</body>
</html>