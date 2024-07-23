<x-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6">Users</h1>

        <!-- Add new user button -->
        <div class="flex justify-between mb-4">
            <button class="bg-purple-600 text-white p-2 rounded">Add New User</button>
        </div>

        <!-- Users table -->
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Role</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            <!-- Populate with users dynamically -->
            </tbody>
        </table>
    </div>
</x-layout>
