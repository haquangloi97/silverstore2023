<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Dashboard() {
        if (Auth::check())
            return view('dashboard.dashboard');
        return redirect()->route('getLogin');
    }

    public function GetLogin() {
        if (Auth::check())
            return redirect()->route('dashboard');
        return view('dashboard.login');
    }

    public function PostLogin(Request $request) {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Please enter your email address',
            'password.required' => 'Please enter your password'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
            return redirect()->route('dashboard');
        else
            return redirect()->route('getLogin')->with('failure', 'The email address or password is incorrect');
    }

    public function GetRegistration() {
        if (Auth::check())
            return redirect()->route('dashboard');
        return view('dashboard.registration');
    }

    public function PostRegistration(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
        ], [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email address',
            'password.required' => 'Please enter your password',
            'email.unique' => 'Your email address already exists',
            'password.confirmed' => 'Confirm password does not match'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('getRegistration')->with('success', 'Congratulations, your account has been successfully created');
    }

    public function Logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('getLogin');
    }
}
