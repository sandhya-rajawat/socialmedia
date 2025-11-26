<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthService;

class LoginController extends Controller {
    protected $authService;
    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function create(): View {
        return view('auth.login');
    }
    public function store(LoginRequest $request) {

        $details = $request->only('email', 'password');
        if ($this->authService->login($details)) {
            return redirect()->route('home')->with('success', 'Welcome!');
        }
        return back()->with('error', 'Invalid Email or Password');
    }
}
