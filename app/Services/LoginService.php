<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LoginService extends Service
{
    public function authenticate($request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return true;
        }
        return false;
    }

    public function logout($request)
    {
        auth()->logout();
        $request->session()->flush();
        return true;
    }
}
