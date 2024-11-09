<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Question;
use App\Http\Requests\UpdateQuestionTagsRequest;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::with('questionTags')->paginate(10);
        return view('tags.index', compact('tags'));
    }

    public function applyTags(UpdateQuestionTagsRequest $request, Question $question)
    {
        $question->tags()->sync($request->tags);
        return redirect()->route('questions.edit', $question->id);
    }
}
