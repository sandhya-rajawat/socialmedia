<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use  App\Http\Requests\AuthRequest;
use  App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AuthController extends Controller
{



    public function createSignIn()
    {
        return view('signin');
    }
    public function createSignUp()
    {
        return view('signup');
    }

    public function store(AuthRequest $request)
    {
        $dob = sprintf('%04d-%02d-%02d', $request->year, $request->month, $request->day);

        $userinfo = [
            'first_name' => $request->firstname,
            'last_name'  => $request->lastname,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'dob'        => $dob,
            'password'   => Hash::make($request->password),
        ];

        $user = User::create($userinfo);

        if ($user) {
            return redirect('/signin')->with("success", 'Account created! Please log in.');
        } else {
            return back()->with("error", 'Failed to create account!');
        }
    }
    public function loginUser(LoginRequest $request)
    {
        $userinfo = User::Where('email', $request->email)->first();
        if ($userinfo && Hash::check($request->password, $userinfo->password)) {
            Session::put('user_id', $userinfo->id);
            return redirect('/dashboard')->with('success', 'Logged in successfully!');
        }
        return back()->with('error', 'Invalid Email or Password');
    }
}
