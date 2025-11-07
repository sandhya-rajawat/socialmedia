<?php
use App\Models\User;
use App\Models\Post;
test('redirects guest to login when accessing posts ', function () {
    $response = $this->get('posts');
    $response->assertStatus(302);
    $response->assertRedirect('/login');
});
test('shows posts page when user is logged in', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/posts');
    $response->assertStatus(200);
});
test('shows user-created post on posts page', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create([
        'user_id' => $user->id,
        'content' => 'This is a test post content.',
    ]);
    $response = $this->actingAs($user)->get('/posts');
    $response->assertStatus(200);
    $response->assertSee('This is a test post content.');
});
