<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::orderBy('name', 'asc')->whereNotIn('name', ['super-admin'])->get();

        return view('roles.index', [
            'roles' => $roles,
        ]);
    }

    public function create(): View
    {
        $permissions = Permission::all();

        return view('roles.add-role', [
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:1|max:250|unique:roles,name',
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);

        /** @var Role $newRole */
        $newRole = Role::create([
            'name' => $request->name,
        ]);

        if (isset($request->permissions)) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $newRole->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Added with success!');
    }

    public function edit(Role $role): View
    {
        $role = Role::whereNotIn('name', ['super-admin'])->findOrFail($role->id);
        $permissions = Permission::all();

        return view('roles.edit-role', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:1|max:250|unique:roles,name,'.$role->id,
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);

        $role = Role::whereNotIn('name', ['super-admin'])->findOrFail($role->id);
        $role->update([
            'name' => $request->name,
        ]);

        if (isset($request->permissions)) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Updated with success!');
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role = Role::whereNotIn('name', ['user', 'super-admin'])->findOrFail($role->id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Deleted with success!');
    }
}
