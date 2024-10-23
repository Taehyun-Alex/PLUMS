<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Classes\TelemetryClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitQuizForResultsRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function fetchQuizInfo(Quiz $quiz) {
        $toReturn = [];

        foreach ($quiz->questions as $question) {
            $toAdd = [
                'id' => $question->id,
                'question' => $question->question,
                'answers' => []
            ];

            foreach ($question->answers as $answer) {
                $toAdd['answers'][] = [
                    'id' => $answer->id,
                    'answer' => $answer->answer,
                ];
            }

            $toReturn[] = $toAdd;
        }

        return ApiResponseClass::sendResponse($toReturn, "Fetched quiz information");
    }

    public function submitQuiz(SubmitQuizForResultsRequest $request)
    {
        $user = auth('sanctum')->user();
        $validated = $request->validated();
        $submitted = $validated['answers'];
        $quizId = $validated['id'] ?? null;

        if (!$quizId) {
            return $this->submitDynamicQuiz($request);
        }

        if (!$submitted || !is_array($submitted)) {
            return ApiResponseClass::sendResponse([], 'Failed to grade', false, 400);
        }

        $score = 0;
        $totalScore = 0;
        $correct = [];
        $incorrect = [];

        foreach ($submitted as $submission) {
            $questionId = $submission['questionId'];
            $answerId = $submission['answerId'];
            $question = Question::find($questionId);

            if (!$question) {
                continue;
            }

            $answers = $question->answers;
            $toScore = $question->score;
            $submittedAnswer = $answers->firstWhere('id', $answerId);

            if ($submittedAnswer && $submittedAnswer->correct) {
                $score += $toScore;
                $correct[] = $questionId;
            } else {
                $correctAnswer = $answers->firstWhere('correct', true);
                $incorrect[] = [
                    'question' => [
                        'id' => $question->id,
                        'text' => $question->question,
                    ],
                    'submittedAnswer' => [
                        'id' => $submittedAnswer->id,
                        'text' => $submittedAnswer->answer,
                    ],
                    'correctAnswer' => $correctAnswer ? [
                        'id' => $correctAnswer->id,
                        'text' => $correctAnswer->answer,
                    ] : null
                ];
            }

            $totalScore += $toScore;
        }

        $results = [
            'id' => $quizId ?? "dynamic",
            'score' => $score,
            'totalScore' => $totalScore,
            'percentage' => ($score / $totalScore) * 100,
            'correct' => $correct,
            'incorrect' => $incorrect,
        ];

        TelemetryClass::logTelemetry('quiz_graded', $results, 'mobile', $request->ip(), $user->id);
        return ApiResponseClass::sendResponse($results, 'Graded successfully');
    }

    public function submitDynamicQuiz(SubmitQuizForResultsRequest $request)
    {
        $user = auth('sanctum')->user();
        $validated = $request->validated();
        $submitted = $validated['answers'];

        if (!$submitted || !is_array($submitted)) {
            return ApiResponseClass::sendResponse([], 'Failed to grade', false, 400);
        }

        $results = [];

        foreach ($submitted as $submission) {
            $questionId = $submission['questionId'];
            $answerId = $submission['answerId'];
            $question = Question::find($questionId);

            if (!$question) {
                continue;
            }

            $certificateLevel = $question->certificate_level;
            $toScore = $question->score;
            $answers = $question->answers;
            $submittedAnswer = $answers->firstWhere('id', $answerId);

            if (!isset($results[$certificateLevel])) {
                $results[$certificateLevel] = [
                    'score' => 0,
                    'totalScore' => 0,
                    'correct' => [],
                    'incorrect' => [],
                ];
            }

            $correctAnswer = $answers->firstWhere('correct', true);
            $isCorrect = $submittedAnswer && $submittedAnswer->correct;

            if ($isCorrect) {
                $results[$certificateLevel]['score'] += $toScore;
                $results[$certificateLevel]['correct'][] = $questionId;
            } else {
                $results[$certificateLevel]['incorrect'][] = [
                    'question' => [
                        'id' => $question->id,
                        'text' => $question->question,
                    ],
                    'submittedAnswer' => [
                        'id' => $submittedAnswer->id ?? null,
                        'text' => $submittedAnswer->answer ?? null,
                    ],
                    'correctAnswer' => [
                        'id' => $correctAnswer->id,
                        'text' => $correctAnswer->answer,
                    ]
                ];
            }

            $results[$certificateLevel]['totalScore'] += $toScore;
        }

        foreach ($results as $level => $data) {
            $results[$level]['percentage'] = ($data['totalScore'] > 0)
                ? ($data['score'] / $data['totalScore']) * 100
                : 0;
        }

        $finalResults = [
            'id' => "dynamic",
            'results' => $results,
        ];

        TelemetryClass::logTelemetry('dynamic_quiz_graded', $finalResults, 'mobile', $request->ip(), $user->id);
        return ApiResponseClass::sendResponse($finalResults, 'Graded dynamic quiz successfully');
    }
}
