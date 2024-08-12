<x-layout>
    <div>
        <form action="{{ route('users.store') }}" method="POST" class="p-6">
            @csrf

            <h2 class="text-xl font-semibold text-gray-800 mb-4">Create User</h2>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                <input
                    id="name"
                    name="name"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                >
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    name="email"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                >
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    id="password"
                    name="password"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                >
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                >
            </div>
            <div class="mb-4">
                <label for="description" class="block w-full text-sm font-medium">Role</label>
                <select class="grow rounded-md"
                        id="Role"
                        name="role"
                >
                    <option value="staff" selected>Staff</option>
                </select>
            </div>
            <div class="flex flex-row items-center justify-center gap-2">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition duration-300">Create User</button>
                <a href="{{ route('dashboard') }}" class="block bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md transition duration-300">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
