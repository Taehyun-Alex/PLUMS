<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $sections = Section::with(['course', 'certificate'])->paginate(10);

        if ($request->wantsJson()) {
            return response()->json($sections);
        }

        return view('sections.index', compact('sections'));
    }

    public function store(Request $request)
    {
        $section = new Section();
        $section->course_id = $request->course_id;
        $section->certificate_id = $request->certificate_id;
        $section->section_name = $request->section_name;
        $section->save();

        if ($request->wantsJson()) {
            return response()->json($section, 201);
        }

        return redirect()->route('sections.index');
    }

    public function update(Request $request, Section $section)
    {
        $section->course_id = $request->course_id;
        $section->certificate_id = $request->certificate_id;
        $section->section_name = $request->section_name;
        $section->save();

        if ($request->wantsJson()) {
            return response()->json($section);
        }

        return redirect()->route('sections.index');
    }

    public function destroy(Request $request, Section $section)
    {
        $section->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Section deleted successfully.']);
        }

        return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
    }
}
