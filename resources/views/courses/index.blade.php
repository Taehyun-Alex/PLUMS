<x-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold text-center text-purple-800 mb-6">Courses List</h1>

                <!-- Courses Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quizzes Count</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Hard-coded data rows -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Certificate III in IT (Web Development)</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Introduction to web development with HTML, CSS, and JavaScript.</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <!-- Action buttons -->
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md transition duration-300">Edit</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md transition duration-300">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Certificate IV in IT (Programming)</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Advanced programming concepts with Python and Java.</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">5</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <!-- Action buttons -->
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md transition duration-300">Edit</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md transition duration-300">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Diploma of IT (Advanced Programming)</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Advanced software development skills with focus on backend frameworks.</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">7</td>
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

                <!-- Add Course Button -->
                <div class="flex justify-end mt-4">
                    <a href="#" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md transition duration-300">Add Course</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
