<x-layout>
    <div class="container mx-auto p-6 bg-white">
        <h1 class="text-3xl font-bold text-center text-purple-800 mb-6">Manage Users</h1>
{{--            <div class="mb-4 flex justify-between items-center">--}}

                <section class="flex justify-between items-center mb-4">
        @can('create-user')
            <a href="{{ route('users.create') }}"
               class="bg-purple-500 text-white p-2 rounded hover:bg-purple-700
                      duration-300 ease-in-out transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            {{ __('New User') }}
            </a>
        @endcan

        @can('view-trash')
            <a href="{{ route('users.trash') }}"
               class="p-2 px-4 text-center rounded-md h-10
                              @if($trashedCount>0)
                                text-slate-200 hover:text-slate-600 bg-slate-600 hover:bg-slate-500
                              @else
                                text-slate-600 hover:text-slate-200 bg-slate-200 hover:bg-slate-500
                              @endif
                              duration-300 ease-in-out transition-all space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 6h14M3 9v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9m-9-4V2m4 0v3m-8 0v3m4 0v3m4 0v3m4 0v3" />
                </svg>
{{--                <i class="fa fa-trash font-xl"></i>--}}
                {{ $trashedCount }} {{ __('Deleted') }}
            </a>
        @endcan
        </section>

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
        <table class="min-w-full bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300">
            <thead class="bg-purple-500 text-white">
            <tr class="w-full">
                <th class="py-2 px-4 text-center border-b border-gray-300 flex-1">Name</th>
                <th class="py-2 px-4 text-center border-b border-gray-300 flex-1">Email</th>
                <th class="py-2 px-4 text-center border-b border-gray-300 flex-1">Role</th>
                <th class="py-2 px-4 text-center border-b border-gray-300 flex-1">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="w-full">
                    <td class="py-2 px-4 text-center flex-1 border-b border-gray-200">{{ $user->name }}</td>
                    <td class="py-2 px-4 text-center flex-1 border-b border-gray-200">{{ $user->email }}</td>
                    <td class="py-2 px-4 text-center flex-1 border-b border-gray-200">{{ $user->getRole() }}</td>
                    <td class="py-2 px-4 text-center flex-1 justify-end border-b border-gray-200">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('users.show', $user->id) }}"

                               class="bg-green-500 text-white p-2 rounded hover:bg-green-600">
                                View
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="bg-purple-500 text-white p-2 rounded hover:bg-purple-600">
                                Edit
                            </a>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr class="w-full">
                <td colspan="4" class="py-2 px-4 bg-gray-100 border-t border-gray-300 text-center">
                    @if($users->hasPages())
                        {{ $users->links() }}
                    @else
                        <small>No pages.</small>
                    @endif
                </td>
            </tr>
            </tfoot>
        </table>

    </div>
</x-layout>
