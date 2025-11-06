<?php
namespace Tests\Feature;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
it('logs in user successfully with correct credentials', function () {
    $password = "12345678";
    $email = 'sandhya9999@gmail.com';
    $user = User::factory()->create([
        'first_name' => 'Himat',
        'last_name'  => 'Rajawat',
        'email' => $email,
        'password' => Hash::make($password),
    ]);
    $response = $this->post('/login', [
        'email' => $email,
        'password' => $password,
    ]);
    $response->assertStatus(302);
    $response->assertRedirect('/');
    $this->assertAuthenticatedAs($user);
});
it('loads the login page successfully', function () {
    $response = $this->get('/login');
    $response->assertStatus(200);
});