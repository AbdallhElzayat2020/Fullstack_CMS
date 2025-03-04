<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Http\Requests\SendResetLinkRequest;
use App\Mail\AdminEmailMail;
use App\Mail\AdminSendResetLinkMail;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function handleLogin(AdminLoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function forgotPassword()
    {
        return view('dashboard.auth.forgot-password');
    }

    // Send the reset link to the email with Token
    public function sendResetLink(SendResetLinkRequest $request): RedirectResponse
    {
        $token = Str::random(60);

        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();

        Mail::to($request->email)->send(new AdminSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', 'A link has been sent to your email Please check');
    }

    //show the form to reset the password
    public function resetPassword($token)
    {
        return view('dashboard.auth.reset-password', compact('token'));
    }

    // Submit the form to reset the password
    public function handleResetPassword(AdminResetPasswordRequest $request): RedirectResponse
    {
        $admin = Admin::where(['email' => $request->email, 'remember_token' => $request->token])->first();
        if (!$admin) {
            return redirect()->back()->with('error', 'Invalid token');
        }
        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();
        return redirect()->route('admin.login')->with('success', 'Password has been reset successfully');
    }
}
