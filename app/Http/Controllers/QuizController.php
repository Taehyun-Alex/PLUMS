<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create()
    {
        return view('quiz');
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
            ['answer_text' => $validated['optionA'], 'is_correct' => $validated['correctAnswer'] === 'A'],
            ['answer_text' => $validated['optionB'], 'is_correct' => $validated['correctAnswer'] === 'B'],
            ['answer_text' => $validated['optionC'], 'is_correct' => $validated['correctAnswer'] === 'C'],
            ['answer_text' => $validated['optionD'], 'is_correct' => $validated['correctAnswer'] === 'D'],
        ];

        foreach ($answers as $answer) {
            $question->answers()->create($answer);
        }

        return redirect()->route('quizzeslist');
    }

    public function index()
    {
        $quizzes = Quiz::with('questions')->get();
        return view('quizzeslist', compact('quizzes'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
