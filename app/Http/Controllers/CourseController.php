<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show', 'enroll', 'unenroll', 'participants']);
    }

    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Course::create($validated);
        return redirect()->route('courses.index')->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course->update($validated);
        return redirect()->route('courses.index')->with('success', 'Kursus diperbarui.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Kursus dihapus.');
    }

    public function enroll(Course $course)
    {
        auth()->user()->courses()->attach($course->id);
        return redirect()->back()->with('success', 'Berhasil mendaftar kursus.');
    }

    public function unenroll(Course $course)
    {
        auth()->user()->courses()->detach($course->id);
        return redirect()->back()->with('success', 'Berhasil membatalkan kursus.');
    }

    public function participants(Course $course)
    {
        $participants = $course->users;
        return view('courses.participants', compact('course', 'participants'));
    }

    public function allParticipants()
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        $courses = Course::with('users')->get();
        return view('courses.all-participants', compact('courses'));
    }
}
