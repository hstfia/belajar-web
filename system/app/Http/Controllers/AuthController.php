<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function halamanLogin() {
        // return bcrypt('77777');
        return view('login');
    }

    function prosesLogin(Request $request) {
        {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);


            if (Auth::guard('pengguna')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended('admin/dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
}
