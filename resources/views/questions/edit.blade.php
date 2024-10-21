<x-layout>
    <div class="container mx-auto p-6 bg-white">
        <h1 class="text-2xl font-bold mb-6">Edit Question</h1>

        <form action="{{ route('questions.update', $question->id) }}" class="mb-4" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Question</label>
                <input type="text" name="name" id="name" value="{{ old('name', $question->question) }}" placeholder="Enter Question Text" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                <input type="text" name="tags" id="tags" value="{{ old('tags', $question->tags) }}" placeholder="Enter Question Tags as CSV (a,b,c)" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="flex items-center justify-center gap-2">
                <button type="submit" class="bg-purple-500 text-white p-2 rounded">Update Question</button>
                <a href="{{ route('questions.index') }}" class="bg-red-600 text-white p-2 rounded">Cancel</a>
            </div>
        </form>

        <h1 class="text-2xl font-bold mb-6">Edit Answers</h1>

        <form action="{{ route('answers.store') }}" class="mb-4" method="POST">
            @csrf
            @method('POST')

            <input type="number" name="question_id" id="question_id" value="{{$question->id}}" class="hidden">

            <div class="mb-4">
                <label for="answer" class="block text-sm font-medium text-gray-700">Answer</label>
                <input type="text" name="answer" id="answer" placeholder="Enter Answer Text" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-4">
                <label for="correct" class="block w-full text-sm font-medium">Correct Answer</label>
                <select class="grow rounded-md"
                        id="correct"
                        name="correct"
                >
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select>
            </div>

            <div class="flex items-center justify-center gap-2">
                <button type="submit" class="bg-purple-500 text-white p-2 rounded">Create Answer</button>
            </div>
        </form>

        <table class="min-w-full bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300">
            <thead class="bg-purple-500 text-white">
            <tr class="w-full">
                <th class="py-2 px-4 text-center border-b border-gray-300 flex-1">Answer</th>
                <th class="py-2 px-4 text-center border-b border-gray-300 flex-1">Correct</th>
                <th class="py-2 px-4 text-center border-b border-gray-300 flex-1">Actions</th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 text-center">
            @foreach($question['answers'] as $answer)
                <tr>
                    <td class="py-2 px-4 text-center border-b border-gray-200">{{ $answer['answer'] }}</td>
                    <td class="py-2 px-4 text-center border-b border-gray-200">
                        {{ $answer['correct'] ? "Yes" : "No" }}
                    </td>
                    <td class="py-2 px-4 text-center border-b border-gray-200">
                        <div class="flex justify-center space-x-2">
                            <form action="{{ route('answers.edit', $answer) }}" method="GET">
                                @csrf
                                <button type="submit" class="w-full bg-purple-500 hover:bg-purple-700 text-white py-1 px-3 rounded-md transition duration-200">Edit</button>
                            </form>
                            <form action="{{ route('questions.delete', $answer) }}" method="GET">
                                @csrf
                                <button class="w-full bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-md transition duration-200">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr class="w-full">
                <td colspan="3" class="py-2 px-4 bg-gray-100 border-t border-gray-300 text-center">

                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</x-layout>
