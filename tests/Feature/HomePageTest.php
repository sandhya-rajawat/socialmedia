<?php

test('Home page Successfuly work', function () {
    $response = $this->get('/');

    $response->assertStatus(302);
    $response->assertRedirect('login');
});
