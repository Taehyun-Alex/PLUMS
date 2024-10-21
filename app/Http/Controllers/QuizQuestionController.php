<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function index(Request $request)
    {
        $tag = $request->query('tag');


        if ($tag) {

            $questions = QuizQuestion::where('tags', 'LIKE', '%' . $tag . '%')->get();


            if ($questions->isEmpty()) {
                return response()->json([
                    'message' => 'No questions found for the specified tag: ' . $tag,
                ], 404);
            }

            return response()->json($questions);
        }


        $questions = QuizQuestion::all();

        return response()->json($questions);
    }
}
