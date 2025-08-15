<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // ← HARUS DI SINI, di luar class
use App\Models\User;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function welcome(){
        return view('welcome');
    }

    public function save_user(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255'

            ],
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return response()->json(['message' => 'User saved successfully!']);
    }
}
