<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Services\RegistrationService;

class RegisterController extends Controller {

    protected $registrationService;
    public function __construct(RegistrationService $registrationService) {
        $this->registrationService = $registrationService;
    }

    public function create(): View {
        return view('auth.register');
    }
    public function store(RegisterRequest $request) {
     
        $user =  $this->registrationService->register($request->validated());
        if ($user) {
            return redirect()->route('login')->with('success', 'Account created! Please log in.');
        } else {
            return back()->with('error', 'Failed to create account!');
        }
    }
}
