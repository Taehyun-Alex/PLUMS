<x-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6">Users</h1>

        @can('create-user')
        <section class="flex justify-between mb-4">
            <a href="{{ route('users.create') }}"
               class="bg-purple-500 text-white p-2 rounded hover:bg-purple-800
                      duration-300 ease-in-out transition-all">
            <i class="fa fa-user-plus font-xl"></i>
            {{ __('New User') }}
            </a>

            @role ('admin')
            <a href="{{ route('users.trash') }}"
               class="p-2 px-4 text-center rounded-md h-10
                              @if($trashedCount>0)
                              text-slate-200 hover:text-slate-600 bg-slate-600 hover:bg-slate-500
                              @else
                              text-slate-600 hover:text-slate-200 bg-slate-200 hover:bg-slate-500
                              @endif
                              duration-300 ease-in-out transition-all space-x-2">
                <i class="fa fa-trash font-xl"></i>
                {{ $trashedCount }} {{ __('Deleted') }}
            </a>
            @endrole



        </section>
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
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('users.show', $user->id) }}"
                               class="bg-green-500 text-white p-2 rounded hover:bg-green-600">
                                View
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="bg-orange-500 text-white p-2 rounded hover:bg-orange-600">
                                Edit
                            </a>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                            @can('assign-roles')
                                <!-- Assign Role Button -->
                                <a href="{{ route('users.assign_role_form', $user->id) }}"
                                   class="bg-green-600 text-white p-2 rounded">
                                    Assign Role
                                </a>

                                <!-- Remove Role Button -->
                                <a href="{{ route('users.remove_role_form', $user->id) }}"
                                   class="bg-yellow-600 text-white p-2 rounded">
                                    Remove Role
                                </a>
                            @endcan
                        </div>
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
