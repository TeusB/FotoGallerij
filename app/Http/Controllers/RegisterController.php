<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view("register");
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email'   => 'required|unique:users|email',
            'password'   => 'required|max:50|min:6',
            'name' => 'required|unique:users'
        ]);
        $user = new user();
        $user->name = $validate["name"];
        $user->email = $validate['email'];
        $user->password = Hash::make($validate['password']);
        if ($user->save()) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('homePhotos');
            }
        }
        return back()->with('status', "kon account niet registeren");
    }
}
