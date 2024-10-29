<x-layout>
    <h2 class="text-xl font-semibold text-gray-800 mb-2">Create New Question</h2>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf

        <div class="mb-2">
            <label for="question_title" class="block text-sm font-medium text-gray-700">Question</label>
            <input
                type="text"
                name="question"
                id="question"
                placeholder="Enter Question Text"
                class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-gray-100 p-3 focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50"
                required>
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
            <input
                type="text"
                name="tags"
                id="tags"
                placeholder="Enter Question Tags as CSV (a,b,c)"
                class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-gray-100 p-3 focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50"
                required>
        </div>

        <div class="mb-2">
            <label for="course_id" class="block text-sm font-medium text-gray-700">Course Id</label>
            <input
                type="number"
                name="course_id"
                id="course_id"
                placeholder="Enter Associated Course Id"
                class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-gray-100 p-3 focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50"
            >
        </div>

        <div class="mb-2">
            <label for="score" class="block text-sm font-medium text-gray-700">Score</label>
            <input
                type="number"
                name="score"
                id="score"
                value="1"
                placeholder="Enter Question Score"
                class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-gray-100 p-3 focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50"
                required>
        </div>

        <div class="flex flex-row items-center justify-center gap-2">
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition duration-300">Create Question</button>
            <a href="{{ route('questions.index') }}" class="block bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md transition duration-300">Cancel</a>
        </div>
    </form>
</x-layout>
