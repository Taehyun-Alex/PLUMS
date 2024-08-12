<x-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6">Edit User</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('users.index') }}" class="bg-gray-600 text-white p-2 rounded">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white p-2 rounded">Update User</button>
            </div>
        </form>
    </div>
</x-layout>
