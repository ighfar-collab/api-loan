<?php

it('user can register', function () {

    $response = $this->postJson('/api/register', [
        'name' => 'Ighfar',
        'email' => 'ighfar@test.com',
        'password' => 'password'
    ]);

    $response
        ->assertStatus(201)
        ->assertJsonStructure([
            'user',
            'token'
        ]);

});