<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.admin_login');
    }

    public function loginPost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('panel');
        }
        return redirect()->route('admin.login')->withErrors('Email veya şifre hatalı');
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('admin.login');
    }
}
