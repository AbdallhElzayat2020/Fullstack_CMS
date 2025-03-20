<?php

namespace App\Repositories;


use App\Interfaces\RoleUserRepositoryInterface;
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
dd($request->all());
    }
}
