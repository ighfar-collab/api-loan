<?php

use App\Models\User;
use App\Models\Loan;

it('can repay loan', function () {

    $user = User::factory()->create();

    $loan = Loan::factory()->create([
        'user_id' => $user->id
    ]);

    $response = $this
        ->actingAs($user)
        ->postJson('/api/repayments', [
            'loan_id' => $loan->id,
            'amount' => 100000
        ]);

    $response
        ->assertStatus(201);

});