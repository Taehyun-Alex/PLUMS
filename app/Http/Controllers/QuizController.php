<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation check
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|integer|exist:course, id',
            'level' => 'required|string|max:255',
        ]);

        // Quiz create & Save
        $quiz = Quiz::create([
            'title' => $validatedData['title'],
            'course_id' => $validatedData['course_id'],
            'level' => $validatedData['level'],
        ]);

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
