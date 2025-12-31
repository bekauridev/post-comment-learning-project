<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogInRequest;
use App\Http\Requests\StoreSignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.signup');
    }


    public function authenticate(StoreLogInRequest $request)
    {
        $attributes = $request->validated();

        $user = User::where('email', $attributes['email'])->first();

        $password_matches = Hash::check($attributes['password'], $user->password);

        if (!$user || !$password_matches) {
            return back()->withErrors(['error' => 'The provided credentials are incorrect.']);
        }

        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/')->with('success', 'Registration successful!');
    }

    public function register(StoreSignUpRequest $request)
    {
        $attributes = $request->validated();

        $user = User::create([
            'username' => $attributes['username'] ?? null,
            'email' => $attributes['email'],
            'password' => $attributes['password'],
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
