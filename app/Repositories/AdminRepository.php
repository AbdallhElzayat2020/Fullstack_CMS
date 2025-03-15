<?php

namespace App\Repositories;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Http\Requests\SendResetLinkRequest;
use App\Interfaces\AdminRepositoryInterface;
use App\Mail\AdminSendResetLinkMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminRepository implements AdminRepositoryInterface
{

    public function login()
    {
        try {
            return view('dashboard.auth.login');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function handleLogin(AdminLoginRequest $request)
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard', absolute: false));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::guard('admin')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/admin/login');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function forgotPassword()
    {
        try {
            return view('dashboard.auth.forgot-password');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function sendResetLink(SendResetLinkRequest $request)
    {
        try {
            $token = Str::random(60);
            $email = $request->email;
            $admin = Admin::where('email', $email)->first();
            $admin->remember_token = $token;
            $admin->save();

            Mail::to($email)->send(new AdminSendResetLinkMail($token, $email));

            return redirect()->back()->with('success', __('A link has been sent to your email Please check your email'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $token = $request->token;
            return view('dashboard.auth.reset-password', compact('token'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function handleResetPassword(AdminResetPasswordRequest $request)
    {
        try {
            $email = $request->email;
            $admin = Admin::where(['email' => $email, 'remember_token' => $request->token])->first();
            if (!$admin) {
                return redirect()->back()->with('error', 'Invalid token');
            }
            $admin->password = bcrypt($request->password);
            $admin->remember_token = null;
            $admin->save();
            return to_route('admin.login')->with('success', __('Password has been reset successfully'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }
}
