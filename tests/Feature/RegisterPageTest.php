<?php

test('loads the Resgister page successfully', function () {
    $response = $this->get('register');

    $response->assertStatus(200);
});
