<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\User;

class EnrollmentController extends Controller
{
    /**
     * Daftar enrollment + search + filter + pagination
     */
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q'));
        $status = trim((string) $request->query('status'));

        $allowedStatuses = ['Aktif', 'Selesai', 'Dibatalkan'];

        $enrollments = Enrollment::query()
            ->with(['course', 'user'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->whereHas('course', function ($c) use ($search) {
                        $c->where('name', 'like', "%{$search}%")
                          ->orWhere('code', 'like', "%{$search}%");
                    })->orWhereHas('user', function ($u) use ($search) {
                        $u->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");
                    });
                });
            })
            ->when(in_array($status, $allowedStatuses, true), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('enrollments.index', compact('enrollments', 'search', 'status'));
    }

    /**
     * Form tambah enrollment
     */
    public function create()
    {
        $courses = Course::orderBy('name')->get();
        $users   = User::where('role', 'mahasiswa')->orderBy('name')->get();

        return view('enrollments.create', compact('courses', 'users'));
    }

    /**
     * Simpan enrollment baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id'   => 'required|exists:users,id',
            'status'    => 'required|in:Aktif,Selesai,Dibatalkan',
        ]);

        // Cek duplikat: user tidak boleh enroll course yang sama 2x
        $exists = Enrollment::where('course_id', $validated['course_id'])
            ->where('user_id', $validated['user_id'])
            ->exists();

        if ($exists) {
            return back()->withErrors(['user_id' => 'Mahasiswa ini sudah terdaftar di course tersebut.'])
                ->withInput();
        }

        Enrollment::create($validated);

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment berhasil ditambahkan.');
    }

    /**
     * Detail enrollment
     */
    public function show(Enrollment $enrollment)
    {
        $enrollment->load(['course', 'user']);
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Form edit enrollment
     */
    public function edit(Enrollment $enrollment)
    {
        $courses = Course::orderBy('name')->get();
        $users   = User::where('role', 'mahasiswa')->orderBy('name')->get();

        return view('enrollments.edit', compact('enrollment', 'courses', 'users'));
    }

    /**
     * Update enrollment
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id'   => 'required|exists:users,id',
            'status'    => 'required|in:Aktif,Selesai,Dibatalkan',
        ]);

        $enrollment->update($validated);

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment berhasil diperbarui.');
    }

    /**
     * Hapus enrollment
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment berhasil dihapus.');
    }
}