<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function do_register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(url('/'));
    }

    public function do_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(url('/dashboard'));
        }

        return redirect(url('/'));


        // $user = User::where('email', $request->email)->first();
        // if (!$user) {
        //     return redirect(url('/register'));
        // }

        // if (Hash::check($request->password, $user->password)) {
        //     return redirect(url('/dashboard'));
        // } else {
        //     return redirect(url('/register'));
        // }

    }
}
