<?php

test('Post successfully ', function () {
    $response = $this->get('posts');
    $response->assertStatus(302);
    $response->assertRedirect('/login');
               
});
