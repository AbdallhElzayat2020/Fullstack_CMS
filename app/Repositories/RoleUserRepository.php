<?php

namespace App\Repositories;


use App\Interfaces\RoleUserRepositoryInterface;
use App\Models\Admin;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleUserRepository implements RoleUserRepositoryInterface
{

    public function index()
    {
        return view('dashboard.pages.role-user.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('dashboard.pages.role-user.create', compact('roles'));
    }

    public function store($request)
    {
        $user = new Admin();
        $user->image = '';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        /* Assign role to user */
        $user->assignRole($request->role);
        toast(__('Created Successfully'), 'success');
        return to_route('admin.role-users.index');
    }

}
