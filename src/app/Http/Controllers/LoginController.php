<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login', [
            "title" => "Login"
        ]);
    }

    public function showLoginEOForm(){
        return view('login_eo', [
            "title" => "Login Event Organizer"
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return redirect()->back()->withErrors([
            'failed' => 'Email atau password salah'
        ]);
    }

    public function loginEO(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors([
            'message' => 'Email atau password salah'
        ]);
    }
}
