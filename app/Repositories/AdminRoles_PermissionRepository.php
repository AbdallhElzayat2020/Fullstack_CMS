<?php

namespace App\Repositories;

use App\Interfaces\AdminRoles_PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRoles_PermissionRepository implements AdminRoles_PermissionRepositoryInterface
{

    public function index()
    {
        $roles = Role::all();
        return view('dashboard.pages.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');
        return view('dashboard.pages.role.create', compact('permissions'));
    }

    public function store($request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'role_name' => ['required', 'max:255', 'unique:permissions,name'],
        ]);
        /* Create Role */
        $role = Role::create(['guard_name' => 'admin', 'name' => $request->role_name]);

        /* assign permission to the role */
        $role->syncPermissions($request->permissions);

        toast(__('Role Created Successfully'), 'success');
        return to_route('admin.role.index');
    }

    public function edit($id)
    {

    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($request)
    {
        // TODO: Implement destroy() method.
    }
}
