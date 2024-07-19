<x-layout>
    <div>
        <form class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-xl font-semibold text-gray-800">Delete Course</h2>
            <p class="mb-4">Are you sure you want to delete this course? You can recover it at any time within the trash section.</p>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <p
                    id="title"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                >{{ $course["title"] ?? "" }}</p>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <p
                    id="description"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                >{{ $course["description"] ?? "" }}</p>
            </div>
            {{-- For some reason, gap-2 isn't working and only gap-4+ works... don't know why --}}
            <div class="flex flex-row items-center justify-center gap-4">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md transition duration-300">Delete Course</button>
                <a href="{{ route('dashboard') }}" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition duration-300">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
