<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller{

    public function showChangeProfile(){
        return view('change_profile', [
            "title" => "Ubah Profil Saya"
        ]);
    }

    public function postChangeProfile(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phoneNumber' => 'required|string|max:255',
            'birthDate' => 'required|date',
        ]);

        if(Hash::check($request->password,Auth::user()->getAuthPassword())){
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_num = $request->phoneNumber;
            $user->birth = $request->birthDate;
            $user->save();
            return redirect('/profil')->with('success', 'Profil Berhasil diganti');
        }
        else{
            return redirect('/ubah-profil')->with('failed','Password anda salah, coba lagi');
        }   
    }

    public function showChangePassword(){
        return view('change_password', [
            "title" => "Ubah Password Saya"
        ]);
    }

    public function postChangePassword(Request $request){
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        if(Hash::check($request->katasandi,Auth::user()->getAuthPassword())){
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/profil')->with('success', 'Password Berhasil diganti');
        }
        else{
            return redirect('/ubah-password')->with('failed','Password lama anda salah, coba lagi');
        }
    }
}