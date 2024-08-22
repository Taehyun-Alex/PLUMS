<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create()
    {
        $quizzes = Quiz::with('questions.answers')->get();
        return view('quiz', compact('quizzes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'optionA' => 'required|string',
            'optionB' => 'required|string',
            'optionC' => 'required|string',
            'optionD' => 'required|string',
            'correctAnswer' => 'required|string',
        ]);

        $quiz = Quiz::create(['title' => 'Sample Quiz']);

        $question = $quiz->questions()->create([
            'question_text' => $validated['question'],
        ]);

        // Create answers
        $answers = [
            ['answer_text' => $validated['optionA'], 'is_correct' => $validated['correctAnswer'] === 'A' ? 1 : 0],
            ['answer_text' => $validated['optionB'], 'is_correct' => $validated['correctAnswer'] === 'B' ? 1 : 0],
            ['answer_text' => $validated['optionC'], 'is_correct' => $validated['correctAnswer'] === 'C' ? 1 : 0],
            ['answer_text' => $validated['optionD'], 'is_correct' => $validated['correctAnswer'] === 'D' ? 1 : 0],
        ];


        foreach ($answers as $answer) {
            $question->answers()->create($answer);
        }


        return redirect()->route('quizzeslist');
    }

    public function index()
    {
        $quizzes = Quiz::with('questions.answers')->get();
        return view('quizzeslist', compact('quizzes'));
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('edit-quiz', compact('quiz'));
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        //
    }
}
