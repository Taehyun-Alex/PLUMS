<x-layout>
    <div>
        <form class="p-6">
            @csrf
            @method('PUT')

            <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Course</h2>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input
                    id="title"
                    name="title"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                    value="{{ $course["title"] ?? "" }}"
                >
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                >"{{ $course["description"] ?? "" }}"</textarea>
            </div>
            {{-- For some reason, gap-2 isn't working and only gap-4+ works... don't know why --}}
            <div class="flex flex-row items-center justify-center gap-4">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition duration-300">Submit Changes</button>
                <a href="{{ route('dashboard') }}" class="block bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md transition duration-300">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
