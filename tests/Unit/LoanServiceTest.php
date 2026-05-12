<?php

use App\Services\LoanService;

it('calculates total loan with interest', function () {

    $service = new LoanService();

    $total = $service->calculateTotal(
        amount: 1000000,
        interestRate: 10
    );

    expect($total)->toBe(1100000);

});