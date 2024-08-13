<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display users
     * @return View | RedirectResponse
     */
    public function index(): View | RedirectResponse {
        $user = auth()->user();

        if (!$user->hasPermissionTo('view-users')) {
            return redirect()->route('dashboard');
        }

        $users = User::paginate(10);

        $trashedCount = User::onlyTrashed()->latest()->get()->count();
        return view('users.index', compact(['users', 'trashedCount']));
    }

    /**
     * Display create user form
     * @return View
     */
    public function create(): View {
        $user = auth()->user();

        if (!$user->hasPermissionTo('create-user')) {
            return redirect()->route('dashboard');
        }

        return view('users.create');
    }

    /**
     * Stores newly created user in database
     */
    public function store(StoreUserRequest $request) {
        $roleToAssign = $request->input('role');

        if (!auth()->user()->hasPermissionTo('create-user')) {
            return abort(403, 'You do not have permission to create users.');
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->assignRole($roleToAssign);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id): View
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
    public function edit(User $user): View
    {
        return view('users.edit', compact('user' ));
    }

    public function update(Request $request, User $user)
    {
        // Start with common validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ];

        // Add role validation rule if the current user is an administrator
        if (auth()->user()->hasRole('Administrator')) {
            $rules['role'] = 'required|string|exists:roles,name';
        }

        $validatedData = $request->validate($rules);

        // Update the user with validated data
        $user->update($validatedData);

        // Update password if provided
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Sync roles only if the current user is an administrator
        if (auth()->user()->hasRole('Administrator')) {
            $user->syncRoles([$request->role]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function delete(User $user): View
    {
        return view('users.delete', compact('user'));
    }
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->withSucess("Deleted {$user->name}.");
    }
    public function trash(): View
    {
        $users = User::onlyTrashed()->orderBy('deleted_at')->paginate(5);
        return view('users.trash', compact(['users']));
    }
    public function restore($user): RedirectResponse
    {
        $user = User::onlyTrashed()->findOrFail($user);
        $user->restore();
        return redirect()->back()->with('success', "Restored {$user->name}.");
    }
    public function remove($user): RedirectResponse
    {
        $user = User::withTrashed()->findOrFail($user);
        $user->forceDelete();
        return redirect()->route('users.trash')
            ->with('success', 'User permanently deleted.');
    }
    public function restoreAll(): RedirectResponse
    {
        $users = User::onlyTrashed()->get();
        $trashCount = $users->count();

        foreach ($users as $user) {
            $user->restore(); // This restores the soft-deleted user
        }
        return redirect(route('users.trash'))
            ->with('success', "successfully recovered {$trashCount} of user(s).");
    }
    public function empty(): RedirectResponse
    {
        $users = User::onlyTrashed()->get();
        $trashCount = $users->count();
        foreach ($users as $user) {
            $user->forceDelete(); // This restores the soft-deleted user
        }
        return redirect(route('users.trash'))
            ->with('success', "Successfully emptied {$trashCount} of user(s) .");
    }
}
