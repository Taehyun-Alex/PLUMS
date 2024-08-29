<x-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold text-center text-purple-800 mb-6">Create New Quiz</h1>

                <!-- Quiz Creation Form -->
                <form action="{{ route('quizzes.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Quiz Title</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                        <select name="course_id" id="course_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                            <!-- Options -->
                            <option value="1">Front-End-Development</option>
                            <option value="2">Back-End-Development</option>
                            <option value="3">Web Development</option>
                            <option value="4">Cyber Security</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                        <select name="level" id="level" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                            <!-- Options -->
                            <option value="Beginner">Certificate III</option>
                            <option value="Intermediate">Certificate IV</option>
                            <option value="Advanced">Diploma</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-4">

                        <!-- Create Quiz Button -->
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition duration-300">
                            Create Quiz
                        </button>


                        <!-- Cancel Button -->
                        <a href="{{ route('quizzes.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-md transition duration-300">
                            Cancel
                        </a>


                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
