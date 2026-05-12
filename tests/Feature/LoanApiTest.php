<?php

use App\Models\User;

it('authenticated user can create loan', function () {

    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->postJson('/api/loans', [
            'amount' => 5000000,
            'interest_rate' => 10,
            'due_date' => '2026-12-01'
        ]);

    $response
        ->assertStatus(201)
        ->assertJsonFragment([
            'amount' => 5000000
        ]);

});