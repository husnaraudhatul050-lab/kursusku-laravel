<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Menampilkan daftar kursus (Read)
     */
    public function index()
    {
        $courses = Course::latest()->get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Menampilkan form tambah kursus
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Menyimpan data kursus baru ke database (Create)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code'        => ['required', 'max:20', 'unique:courses,code'],
            'name'        => ['required', 'max:120'],
            'description' => ['nullable', 'string'],
            'fee'         => ['required', 'integer', 'min:0'],
            'quota'       => ['required', 'integer', 'min:1', 'max:500'],
            'start_date'  => ['required', 'date'],
            'status'      => ['required', 'in:draft,open,closed'],
        ]);

        Course::create($data);

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    // Method lain (show, edit, update, destroy) dikosongkan dulu untuk pertemuan ini
    public function show(Course $course) { }
    public function edit(Course $course) { }
    public function update(Request $request, Course $course) { }
    public function destroy(Course $course) { }
}