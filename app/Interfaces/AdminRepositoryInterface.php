<?php

namespace App\Interfaces;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Http\Requests\SendResetLinkRequest;
use Illuminate\Http\Request;

interface AdminRepositoryInterface
{
    public function login();

    public function handleLogin(AdminLoginRequest $request);

    public function logout(Request $request);

    public function forgotPassword();

    public function sendResetLink(SendResetLinkRequest $request);

    public function resetPassword(Request $request);

    public function handleResetPassword(AdminResetPasswordRequest $request);


}
