<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;

class AuthService {
    public function login(array $credentials): bool 

    {
        if(Auth::attempt($credentials)){
            session()->regenerate();
            return true;
        }
        return false;
    }
}
