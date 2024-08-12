<x-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6">Users</h1>

{{--        {{ dd($users) }}--}}

        <!-- Add new user button -->
        @can('create-user')
        <div class="flex justify-between mb-4">
            <a href="{{ route('users.create') }}" class="bg-purple-600 text-white p-2 rounded">Add New User</a>
        </div>
        @endcan

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
            @foreach($users as $user)
                <tr>
                    <td class="py-2 text-center">
                        {{ $user->name }}
                    </td>
                    <td class="py-2 text-center">
                        {{ $user->email }}
                    </td>
                    <td class="py-2 text-center">
                        {{ $user->getRole() }}
                    </td>
                    <td class="py-2 text-center">

                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="w-full py-1 px-2 border border-transparent">
                        {{ $users->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</x-layout>
