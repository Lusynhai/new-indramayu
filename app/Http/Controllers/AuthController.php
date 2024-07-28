<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Regenerate the session
            $request->session()->regenerate();
            // Redirect to intended location
            return redirect()->intended('/home');
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Show registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration request
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to login with a success message
        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    // Handle logout request
    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();
        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login
        return redirect('/login');
    }

    // Show reset password form
    public function showResetPasswordForm()
    {
        return view('auth.passwords.email');
    }

    // Handle reset password email sending
    public function sendResetPasswordEmail(Request $request)
    {
        // Validate the email
        $request->validate(['email' => 'required|email']);

        // Send the password reset link
        $status = Password::sendResetLink($request->only('email'));

        // Redirect based on the status
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    // Show new password form
    public function showNewPasswordForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    // Handle new password setting
    public function resetPassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Reset the password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        // Redirect based on the status
        return $status === Password::PASSWORD_RESET
                    ? redirect('/login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
