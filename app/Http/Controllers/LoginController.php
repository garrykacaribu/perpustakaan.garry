<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController
{
    public function showLoginForm()
    {
        return view('buku.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('users')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->get();

        if (empty($user[0])) {
            return back();
        } else {
            $request->session()->put('user', $request->username);
            return redirect()->intended('dashboard');
        }
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/login');
    }
}
