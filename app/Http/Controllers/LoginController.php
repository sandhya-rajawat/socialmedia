<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {

        $details=$request->only('email','password');
        if(Auth::attempt($details)){
            $request->session()->regenerate();
            return redirect()->route('home')->with('success','welcome!');
        }
      

        return back()->with('error', 'Invalid Email or Password');
    }
}
