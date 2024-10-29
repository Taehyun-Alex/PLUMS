<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizResultsController extends Controller
{
    public function index(Request $request) {
        $query = $request->input('query');

        // chatgpt query... change if needed
        $results = QuizResult::with(['user', 'quiz', 'course'])
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->whereHas('user', function ($userQuery) use ($query) {
                    $userQuery->where('first_name', 'like', '%' . $query . '%')
                        ->orWhere('last_name', 'like', '%' . $query . '%');
                })->orWhereHas('course', function ($courseQuery) use ($query) {
                    $courseQuery->where('title', 'like', '%' . $query . '%');
                });
            })
            ->paginate(10);

        return view('results.index', compact('results'));
    }

    public function show($id) {
        $results = QuizResult::with(['user', 'quiz', 'course', 'answers'])->findOrFail($id);
        return view('results.show', compact('results'));
    }
}
