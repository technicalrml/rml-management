<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthContoller extends Controller
{
    public function ShowViewLogin()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/user/view');
        }

        return redirect()->route('ShowViewLogin')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
