<?php
use App\Models\User;
use App\Models\Post;
use App\Models\PostLike;
use App\Models\PostComment;
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
test('user can like a post via ajax', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $response = $this->actingAs($user)->post("/posts/{$post->id}/likes");
    $response->assertStatus(200);
    $response->assertJson([
        'success' => true,
        'is_liked' => true,
    ]);
    expect(PostLike::where('post_id', $post->id)->where('user_id', $user->id)->exists())->toBeTrue();
});
test('user can comment a post via ajax', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $response = $this->actingAs($user)->post("/posts/{$post->id}/comments", [
        'content' => 'Nice post!',
    ]);
    $response->assertStatus(200);
    $response->assertJson([
        'success' => true,
    ]);
    $this->assertArrayHasKey('html', $response->json());
    expect(PostComment::where('post_id', $post->id)->where('user_id', $user->id)->exists())->toBeTrue();
});
