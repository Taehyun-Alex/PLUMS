<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(StoreAnswerRequest $request)
    {
        $validated = $request->validated();
        Answer::create($validated);
        $question = Question::find($validated['question_id']);
        return redirect()->route('questions.edit', $question);
    }

    public function edit(Answer $answer)
    {
        return view('answers.edit', compact('answer'));
    }

    public function update(StoreAnswerRequest $request, Answer $answer)
    {
        $validated = $request->validated();
        $answer->update($validated);
        $question = Question::find($answer->question_id);
        return redirect()->route('questions.edit', $question);
    }
}
