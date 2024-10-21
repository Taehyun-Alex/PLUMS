<x-layout>
    <div class="container mx-auto p-6 bg-white">
        <h1 class="text-2xl font-bold mb-6">Edit Answer</h1>

        <form action="{{ route('answers.update', $answer) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="number" name="question_id" id="question_id" value="{{$answer->question_id}}" class="hidden">

            <div class="mb-4">
                <label for="answer" class="block text-sm font-medium text-gray-700">Answer</label>
                <input type="text" name="answer" id="answer" value="{{ old('answer', $answer->answer) }}" placeholder="Enter Answer Text" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-4">
                <label for="correct" class="block w-full text-sm font-medium">Correct Answer</label>
                <select class="grow rounded-md"
                        id="correct"
                        name="correct"
                >
                    <option value="1" {{ $answer->correct == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $answer->correct == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="flex items-center justify-center gap-2">
                <button type="submit" class="bg-purple-600 text-white p-2 rounded">Update Answer</button>
                <a href="{{ route('questions.edit', ['question' => $answer->question_id]) }}" class="bg-red-600 text-white p-2 rounded">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
