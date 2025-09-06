<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\View\View;
class RegisterController extends Controller
{
       public function create():View
    {
        return view('Auth.register');
    }

        public function store(RegisterRequest $request)
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

}

