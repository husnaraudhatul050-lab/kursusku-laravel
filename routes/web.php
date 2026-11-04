<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

// Route Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Resource route untuk courses (Pertemuan 10)
Route::resource('courses', CourseController::class);

// Route untuk enrollment/pendaftaran (Pertemuan 9)
Route::get('/pendaftaran', function () {
    return view('enrollments.create'); // Sesuaikan dengan nama view Anda
})->name('enrollments.create');

Route::post('/pendaftaran', function () {
    // Logika simpan pendaftaran
    return back()->with('success', 'Pendaftaran berhasil!');
})->name('enrollments.store');

// Endpoint AJAX availability
Route::get('/availability/{course}', function (App\Models\Course $course) {
    return response()->json([
        'id'     => $course->id,
        'code'   => $course->code,
        'name'   => $course->name,
        'quota'  => $course->quota,
        'status' => $course->status,
    ]);
})->name('courses.availability');