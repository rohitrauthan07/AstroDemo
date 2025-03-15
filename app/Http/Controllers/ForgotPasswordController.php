<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        try {
            $status = Password::sendResetLink($request->only('email'));

            if ($status === Password::RESET_LINK_SENT) {
                return back()->with('status', __('A password reset link has been sent to your email.'));
            } else {
                return back()->withErrors(['email' => __('Failed to send reset link. Please try again later.')]);
            }
        } catch (\Exception $e) {
            Log::error('Password reset email failed: ' . $e->getMessage());

            return back()->withErrors([
                'email' => 'Something went wrong! Please check your email settings or try again later.'
            ]);
        }
    }
}
