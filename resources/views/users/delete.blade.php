<x-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6">Delete User</h1>

        <p>Are you sure you want to delete <strong>{{ $user->name }}</strong>?</p>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex justify-between mt-6">
                <a href="{{ route('users.index') }}" class="bg-gray-600 text-white p-2 rounded">Cancel</a>
                <button type="submit" class="bg-red-600 text-white p-2 rounded">Delete</button>
            </div>
        </form>
    </div>
</x-layout>
