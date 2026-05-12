<?php

use App\Models\User;

it('validates required fields when creating loan', function () {

    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->postJson('/api/loans', []);

    $response
        ->assertStatus(422)
        ->assertJsonValidationErrors([
            'amount',
            'interest_rate',
            'due_date'
        ]);

});