<x-layout>
    <div class="py-6">
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
                @foreach($courses as $course)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $course['title'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $course['description'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $course['quizzes'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 flex flex-col gap-2">
                            <form action="{{ route('courses.edit') }}">
                                @csrf
                                <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-1 px-3 rounded-md transition duration-300">Edit</button>
                            </form>
                            <form action="{{ route('courses.delete') }}">
                                @csrf
                                <button class="w-full bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-md transition duration-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
