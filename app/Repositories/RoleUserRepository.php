<?php

namespace App\Repositories;


use App\Interfaces\RoleUserRepositoryInterface;
use App\Mail\RoleUserCreateMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class RoleUserRepository implements RoleUserRepositoryInterface
{

    public function index()
    {
//        $admins = Admin::where('email', '!=', 'admin@gmail.com')->get();
        $admins = Admin::all();
        return view('dashboard.pages.role-user.index', compact('admins'));
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

    public function edit($id)
    {
        $roles = Role::all();
        $admin = Admin::findOrFail($id);
        return view('dashboard.pages.role-user.edit', compact('admin', 'roles'));
    }

    public function update($request, $id)
    {

        if ($request->has('password') && !empty($request->password)) {
            $request->validate([
                'password' => ['string', 'min:8', 'confirmed'],
            ]);
        }

        $user = Admin::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('password') && !empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        /* assign role to user */
        $user->syncRoles($request->role);

        toast(__('Updated Successfully'), 'success');
        return to_route('admin.role-users.index');
    }

    public function destroy($id)
    {
        try {

            $admin = Admin::findOrFail($id);
            if ($admin->getRoleNames()->first() === 'Super Admin') {
                return response(['status' => 'error', 'message' => __('You can not delete Super Admin')]);
            }
            $admin->delete();

            return response(['status' => 'success', 'message' => __('Deleted successfully')]);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => __('Something went wrong')]);
        }

    }
}
