<x-layout>
    <div class="container mx-auto p-6 bg-white">
        <h1 class="text-3xl font-bold text-center text-purple-800 mb-6">Quiz Result Answers</h1>

        <section class="flex justify-between items-center mb-4">
            <a href="{{ route('results.index') }}"
               class="bg-purple-500 text-white p-2 rounded hover:bg-purple-800 transition duration-300 ease-in-out">
                Back to Results
            </a>
        </section>

        <section class="mb-6 bg-gray-100 p-4 rounded shadow-sm">
            <h2 class="text-xl font-semibold text-purple-800 mb-2">Quiz Result Details</h2>
            <p><strong>Student:</strong> {{ $results->user->first_name ?? 'Unknown' }} {{ $results->user->last_name ?? 'Student' }}</p>
            <p><strong>Quiz:</strong> {{ $results->quiz->title ?? 'Dynamic' }}</p>
            <p><strong>Course:</strong> {{ $results->quiz ? $results->quiz->course->title: $results->course->title ?? 'Static' }}</p>
            <p><strong>Score:</strong> {{ round(($results->score / $results->total_score) * 100, 2) }}%</p>
            <p><strong>Date Taken:</strong> {{ $results->created_at->format('F j, Y, g:i a') }}</p>
        </section>

        <table class="min-w-full bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300">
            <thead class="bg-purple-500 text-white">
            <tr>
                <th class="py-2 px-4 text-center border-b border-gray-300">Question</th>
                <th class="py-2 px-4 text-center border-b border-gray-300">Selected Answer</th>
                <th class="py-2 px-4 text-center border-b border-gray-300">Correct Answer</th>
                <th class="py-2 px-4 text-center border-b border-gray-300">Result</th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 text-center">
            @foreach($results->answers as $resultAnswer)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $resultAnswer->question->question ?? 'Unknown Question' }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        {{ $resultAnswer->answer->answer ?? 'No Answer Provided' }}
                    </td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        {{ $resultAnswer->question->correctAnswer->answer ?? 'No Correct Answer Available' }}
                    </td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        @if($resultAnswer->answer->id === $resultAnswer->question->correctAnswer->id)
                            <span class="text-green-600 font-semibold">Correct</span>
                        @else
                            <span class="text-red-600 font-semibold">Incorrect</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
