<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileUpdateRequest;
use App\Http\Requests\AdminUpdatePasswordRequest;
use App\Interfaces\AdminProfileRepositoryInterface;
use App\Models\Admin;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    use FileUploadTrait;

    public $admin;

    public function __construct(AdminProfileRepositoryInterface $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->admin->index();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminProfileUpdateRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        return $this->admin->update($request, $id);
    }


    //Update Password for Admin
    public function updatePassword(AdminUpdatePasswordRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        return $this->admin->updatePassword($request, $id);
    }
}
