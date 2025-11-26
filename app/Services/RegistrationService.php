<?php

namespace APP\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationService {
    public function register(array $data): ?User {
        $dob = sprintf('%04d-%02d-%02d', $data['year'], $data['month'], $data['day']);
        $userinfo = [
            'first_name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'dob' => $dob,
            'password' => Hash::make($data['password']),
        ];
        return User::create($userinfo);
    }
}
