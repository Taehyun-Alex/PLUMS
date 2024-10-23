<?php

namespace App\Http\Controllers;

use App\Models\Question;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $questions = Question::with(['section'])->paginate(10);

        if ($request->wantsJson()) {
            return response()->json($questions);
        }

        return view('questions.index', compact('questions'));
    }

    public function show($id)
    {
        Log::info('Fetching questions for quiz ID: ' . $id);
        $question = Question::with('answers')->findOrFail($id);

        if ($question) {
            return response()->json($question);
        } else {
            return response()->json(['error' => 'Quiz not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $question = new Question();
        $question->section_id = $request->section_id;
        $question->question_text = $request->question_text;
        $question->difficulty = $request->difficulty;
        $question->save();

        if ($request->wantsJson()) {
            return response()->json($question, 201);
        }

        return redirect()->route('questions.index');
    }

    public function update(Request $request, Question $question)
    {
        $question->section_id = $request->section_id;
        $question->question_text = $request->question_text;
        $question->difficulty = $request->difficulty;
        $question->save();

        if ($request->wantsJson()) {
            return response()->json($question);
        }

        return redirect()->route('questions.index');
    }

    public function destroy(Request $request, Question $question)
    {
        $question->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Question deleted successfully.']);
        }

        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }
}
