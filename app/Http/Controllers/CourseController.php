<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $softDeletedCount = Course::onlyTrashed()->count();
        return view('courses.index', compact('courses', 'softDeletedCount'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->save();

        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $course->title = $request->title;
        $course->description = $request->description;
        $course->save();

        return redirect()->route('courses.index');
    }

    public function delete(Course $course)
    {
        return view('courses.delete', compact('course'));
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
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

        return redirect()->route('courses.trash')->with('success', 'Course restored successfully.');
    }

    public function forceDelete($id)
    {
        $course = Course::onlyTrashed()->findOrFail($id);
        $course->forceDelete();

        return redirect()->route('courses.trash')->with('success', 'Course deleted permanently.');
    }

}
