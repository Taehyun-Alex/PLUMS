<x-layout>
    <div class="container mx-auto p-6 bg-white">
        <h1 class="text-3xl font-bold mb-6 text-center text-red-600">Delete Quiz</h1>

        <p class="text-center">Are you sure you want to delete the quiz titled <strong>{{ $quiz->title }}</strong>? This will move the quiz to the trash and can be restored later.</p>

        <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex items-center justify-center gap-4 mt-4">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white p-2 rounded transition duration-300">Delete Quiz</button>
                <a href="{{ route('quizzes.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white p-2 rounded transition duration-300">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
