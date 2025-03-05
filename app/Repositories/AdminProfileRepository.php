<?php

namespace App\Repositories;

use App\Http\Requests\AdminProfileUpdateRequest;
use App\Http\Requests\AdminUpdatePasswordRequest;
use App\Interfaces\AdminProfileRepositoryInterface;
use App\Models\Admin;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileRepository implements AdminProfileRepositoryInterface
{
    use FileUploadTrait;

    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('dashboard.profile.index', compact('user'));
    }

    public function update(AdminProfileUpdateRequest $request, string $id)
    {
        $imagePath = $this->handleFileUpload($request, 'image', $request->old_image);
        // save updated data

        $admin = Admin::findOrFail($id);
        $admin->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        toast('Your Profile has been Updated successfully', 'success')->width('400px');

        return redirect()->back();
    }

    public function updatePassword(AdminUpdatePasswordRequest $request, string $id)
    {
        $admin = Auth::guard('admin')->user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => __('Old password does not match')]);
        }

        // Update the old password
        $admin = Admin::findOrFail($id);
        $admin->password = Hash::make($request->password);
        $admin->save();

        toast('Your Password has been Updated successfully', 'success')->width('400px');

        return redirect()->back();
    }
}
