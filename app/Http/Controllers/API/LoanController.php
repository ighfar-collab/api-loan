<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Resources\LoanResource;
use App\Services\LoanService;

class LoanController extends Controller
{
    protected $loanService;

    public function __construct(
        LoanService $loanService
    ) {
        $this->loanService = $loanService;
    }

    public function index()
    {
        return LoanResource::collection(
            $this->loanService->getLoans()
        );
    }

    public function store(StoreLoanRequest $request)
    {
        $loan = $this->loanService->createLoan([
            ...$request->validated(),
            'user_id' => auth()->id()
        ]);

        return new LoanResource($loan);
    }
}