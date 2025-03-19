<?php

namespace App\Repositories;

use App\Interfaces\AdminRoles_PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRoles_PermissionRepository implements AdminRoles_PermissionRepositoryInterface
{

    public function index()
    {
        return view('dashboard.pages.role.index');
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');
        return view('dashboard.pages.role.create', compact('permissions'));
    }

    public function store($request)
    {
        dd($request->all());
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
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
