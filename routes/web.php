<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

// ==========================================
// 1. ROUTE BERANDA (PUBLIK)
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');

// ==========================================
// 2. ROUTE KHUSUS (WAJIB DI ATAS RESOURCE)
// ==========================================
Route::get('/courses/{course}/availability', function (int $course) {
    $availability = [
        1 => ['course' => 'Web Dasar',    'remaining' => 12],
        2 => ['course' => 'PHP Dasar',    'remaining' => 8],
        3 => ['course' => 'Laravel Dasar','remaining' => 4],
    ];
    abort_unless(isset($availability[$course]), 404);
    return response()->json($availability[$course]);
})->name('courses.availability');

// ==========================================
// 3. ROUTE RESOURCE COURSE (FULL CRUD)
// ==========================================
Route::resource('courses', CourseController::class);

// ==========================================
// 4. ROUTE RESOURCE ENROLLMENT (FULL CRUD)
//    ← INI PERBAIKAN UTAMA: hapus ->only()
// ==========================================
Route::resource('enrollments', EnrollmentController::class);

// ==========================================
// 5. ROUTE AUTH (GUEST ONLY)
// ==========================================
Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', function (Request $request) {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Username atau password salah.',
        ])->onlyInput('email');
    })->name('login.attempt');

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => ['required', 'email']]);
        return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
    })->name('password.email');
});

// ==========================================
// 6. ROUTE BUTUH LOGIN (AUTH)
// ==========================================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        $totalCourses      = \App\Models\Course::count();
        $totalParticipants = \App\Models\User::where('role', 'mahasiswa')->count();
        $totalEnrollments  = \App\Models\Enrollment::count();
        $attendanceRate    = 98;

        $recentActivities = [
            ['icon' => '📚', 'text' => 'Course baru <strong>"Pemrograman Web"</strong> ditambahkan', 'time' => '2 jam yang lalu'],
            ['icon' => '👥', 'text' => '15 mahasiswa baru enrolled ke course <strong>"Basis Data"</strong>', 'time' => '5 jam yang lalu'],
        ];

        return view('dashboard', compact(
            'totalCourses', 'totalParticipants', 'totalEnrollments',
            'attendanceRate', 'recentActivities'
        ));
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});