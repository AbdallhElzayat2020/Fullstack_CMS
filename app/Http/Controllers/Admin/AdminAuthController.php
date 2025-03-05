<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Http\Requests\SendResetLinkRequest;
use App\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class AdminAuthController extends Controller
{

    public $admin;
    public function __construct(AdminRepositoryInterface $admin)
    {
        $this->admin = $admin;
    }

    public function login()
    {
        return $this->admin->login();
    }

    public function handleLogin(AdminLoginRequest $request): RedirectResponse
    {
        return $this->admin->handleLogin($request);
    }

    public function logout(Request $request): RedirectResponse
    {
        return $this->admin->logout($request);
    }


    // =======================    Forget Password   =======================

//     show the form to send the email
    public function forgotPassword()
    {
        return $this->admin->forgotPassword();
    }

    // Send the reset link to the email with Token
    public function sendResetLink(SendResetLinkRequest $request): RedirectResponse
    {
        return $this->admin->sendResetLink($request);
    }

    //show the form to reset the password
    public function resetPassword(Request $request)
    {
        return $this->admin->resetPassword($request);
    }

    // Submit the form to reset the password
    public function handleResetPassword(AdminResetPasswordRequest $request): RedirectResponse
    {
        return $this->admin->handleResetPassword($request);
    }
}
