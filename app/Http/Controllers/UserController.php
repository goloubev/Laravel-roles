<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy('name', 'asc')->get();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create(): View
    {
        $roles = Role::all();

        return view('users.add-user', [
            'roles' => $roles,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:1|max:250',
            'email' => 'required|string|min:1|max:250|unique:users,email',
            'role' => 'required|integer|exists:roles,id',
        ]);

        /** @var User $newUser */
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('123'),
        ]);

		if (isset($request->role)) {
	        $role = Role::findById($request->role);
	        $newUser->syncRoles([$role->name]);
		}

        return redirect()->route('users.index')->with('success', 'Added with success!');
    }

    public function edit(User $user): View
    {
        if ($user->email == auth()->user()->email) {
            $roles = Role::whereIn('name', ['super-admin'])->get();
        }
        else {
            $roles = Role::all();
        }

        return view('users.edit-user', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:1|max:250',
            'email' => 'required|string|min:1|max:250|unique:users,email,'.$user->id,
            'role' => 'required|integer|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

		if (isset($request->role)) {
	        $role = Role::findById($request->role);
	        $user->syncRoles([$role->name]);
		}

        return redirect()->route('users.index')->with('success', 'Updated with success!');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Deleted with success!');
    }
}
