<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::with('questions')->paginate(10);
        $softDeletedCount = Course::onlyTrashed()->count();
        return view('courses.index', compact('courses', 'softDeletedCount'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();
        Course::create($validated);
        return view('courses.index');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(StoreCourseRequest $request, Course $course)
    {
        $validated = $request->validated();
        $course->update($validated);
        return redirect()->route('courses.index');
    }

    public function delete(Course $course)
    {
        return view('courses.delete', compact('course'));
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return view('courses.index')->with('success', 'Course deleted successfully.');
    }

    public function trash()
    {
        $trashedCourses = Course::onlyTrashed()->get();

        return view('courses.trash', compact('trashedCourses'));
    }

    public function restore($id)
    {
        $course = Course::onlyTrashed()->findOrFail($id);
        $course->restore();
        return view('courses.trash')->with('success', 'Course restored successfully.');
    }

    public function forceDelete($id)
    {
        $course = Course::onlyTrashed()->findOrFail($id);
        $course->forceDelete();
        return view('courses.trash')->with('success', 'Course deleted permanently.');
    }

}
