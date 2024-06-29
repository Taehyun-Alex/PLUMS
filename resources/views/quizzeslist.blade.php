<x-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold text-center text-purple-800 mb-6">Quizzes List</h1>

                <!-- Trash Button with Count -->
                <div class="mb-4 flex justify-end">
                    <button class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 6h14M3 9v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9m-9-4V2m4 0v3m-8 0v3m4 0v3m4 0v3" />
                        </svg>
                        Quizzes Deleted: <span class="font-bold">0</span>
                    </button>
                </div>

                <!-- Quizzes Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Level</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Hard-coded data rows -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Quiz 1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Course A</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Intermediate</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <!-- Action buttons -->
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md transition duration-300">Edit</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md transition duration-300">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Quiz 2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Course B</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Advanced</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <!-- Action buttons -->
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md transition duration-300">Edit</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md transition duration-300">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
