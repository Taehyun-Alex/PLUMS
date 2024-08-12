<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('users.index', compact(['users']));
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

    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }


}
