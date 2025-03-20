<?php

namespace App\Repositories;


use App\Interfaces\RoleUserRepositoryInterface;
use App\Mail\RoleUserCreateMail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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

        try {
            $user = new Admin();
            $user->image = '';
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            /* Assign role to user */
            $user->assignRole($request->role);

            /* Send Mail to User  */

            Mail::to($request->email)->send(new RoleUserCreateMail($request->email, $request->password));

            toast(__('Created Successfully'), 'success');
            return to_route('admin.role-users.index');

        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
