<?php

namespace App\Interfaces;

interface AdminRepositoryInterface
{
    public function login();
    public function handleLogin();
    public function logout();

    public function forgotPassword();
    public function sendResetLink();

    public function resetPassword();

    public function handleResetPassword();


}
