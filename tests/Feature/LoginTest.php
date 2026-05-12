<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('user can login', function () {

    User::factory()->create([
        'email' => 'ighfar@test.com',
        'password' => Hash::make('password')
    ]);

    $response = $this->postJson('/api/login', [
        'email' => 'ighfar@test.com',
        'password' => 'password'
    ]);

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'token'
        ]);

});