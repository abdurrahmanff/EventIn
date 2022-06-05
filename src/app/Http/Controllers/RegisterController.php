<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register', [
            "title" => "Buat Akun"
        ]);
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:dns|max:255|unique:users',
            'phoneNumber' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'birthDate' => 'required|date',
        ]);

        User::create([
            'name' => $request->name,
            'role_id' => 3,
            'email' => $request->email,
            'password' => Hash::make($request->pasword),
            'phone_num' => $request->phoneNumber,
            'birth' => $request->birthDate,
        ]);

        return redirect('login')->with('success', 'Akun berhasil dibuat. Silahkan login.');
    }

    public function showRegisterEOForm()
    {
        return view('register_eo', [
            "title" => "Buat Akun Event Organizer"
        ]);
    }

    public function postRegisterEO(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login-eo')->with('message', 'Akun berhasil dibuat. Silahkan login.');
    }
}
