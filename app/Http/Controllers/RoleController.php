<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::orderBy('name', 'asc')->get();

        return view('roles.index', [
            'roles' => $roles
        ]);
    }

    public function create(): View
    {
        return view('roles.add-role');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:250',
        ]);

        Role::create($data);

        return redirect()->route('roles.index')->with('success', 'Added with success!');
    }

    public function edit(Role $role): View
    {
        return view('roles.edit-role', [
            'role' => $role,
        ]);
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:250',
        ]);

        $role->update($data);

        return redirect()->route('roles.index')->with('success', 'Updated with success!');
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Deleted with success!');
    }
}
