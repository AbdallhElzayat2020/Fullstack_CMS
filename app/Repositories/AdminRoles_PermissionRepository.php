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
        /* Create a permission with command =>
        php artisan permission:create-permission "permission name here" guard_name
          */
        $permissions = Permission::all()->groupBy('group_name');
        return view('dashboard.pages.role.create', compact('permissions'));
    }

    public function store($request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'role_name' => ['required', 'max:60', 'unique:permissions,name'],
        ]);
        /* Create Role with Multi Guard */
        $role = Role::create(['guard_name' => 'admin', 'name' => $request->role_name]);

        /* assign permissions to the role */
        $role->syncPermissions($request->permissions);

        toast(__('Role Created Successfully'), 'success');
        return to_route('admin.role.index');
    }

    public function edit($id)
    {


        $permissions = Permission::all()->groupBy('group_name');

        $role = Role::findOrFail($id);

        $rolesPermission = $role->permissions->pluck('name')->toArray();

        return view('dashboard.pages.role.edit', compact('role', 'permissions', 'rolesPermission'));
    }

    public function update($request, $id)
    {
//        dd($request->all());
        $request->validate([
            'role_name' => ['required', 'max:60', 'unique:permissions,name'],
        ]);
        /* Create Role with Multi Guard */
        $role = Role::findOrFail($id);
        $role->update(['guard_name' => 'admin', 'name' => $request->role_name]);

        /* assign permissions to the role */
        $role->syncPermissions($request->permissions);

        toast(__('Role Created Successfully'), 'success');
        return to_route('admin.role.index');

    }

    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            if ($role->name=== 'Super Admin'){
                return response(['status' => 'error', 'message' => __('can not be deleted')]);
            }
            $role->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('can not be deleted')]);
        }
    }
}
