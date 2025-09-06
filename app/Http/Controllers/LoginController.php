<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $userinfo = User::Where('email', $request->email)->first();
        if ($userinfo && Hash::check($request->password, $userinfo->password)) {
            Session::put('user_id', $userinfo->id);

            return redirect()->route('home')->with('success', 'Welcome to the homepage!');
        }

        return back()->with('error', 'Invalid Email or Password');
    }
}
