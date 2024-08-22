<x-layout>
    <div class="py-6">
        <h1 class="text-3xl font-bold text-center text-purple-800 mb-6">Courses List</h1>

        <div class="mb-4 flex justify-between items-center">
            <!-- Add course Button -->

            <a href="{{ route('courses.create') }}"
               class="bg-purple-500 text-white p-2 rounded hover:bg-purple-800
                      duration-300 ease-in-out transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('New Course') }}
            </a>


            <!-- Trash Button with Count -->
            <a href="{{ route('courses.trash') }}" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 6h14M3 9v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9m-9-4V2m4 0v3m-8 0v3m4 0v3m4 0v3m4 0v3" />
                </svg>
                Courses Deleted: <span class="font-bold">{{ $softDeletedCount }}</span>
            </a>
        </div>

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
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                            style="max-height: 100px; overflow-y: auto; white-space: pre-wrap; padding: 0.5rem; ">
                            {{ $course['description'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $course['quizzes'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 flex flex-col gap-2">
                            <form action="{{ route('courses.edit', $course->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-1 px-3 rounded-md transition duration-300">Edit</button>
                            </form>
                            <form action="{{ route('courses.delete', $course->id) }}" method="GET">
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
