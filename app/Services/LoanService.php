<?php

namespace App\Services;

use App\Repositories\LoanRepositoryInterface;

class LoanService
{
    protected $loanRepository;

    public function __construct(
        LoanRepositoryInterface $loanRepository
    ) {
        $this->loanRepository = $loanRepository;
    }

    public function getLoans()
    {
        return $this->loanRepository->getAll();
    }

    public function createLoan(array $data)
    {
        return $this->loanRepository->create($data);
    }
     public function calculateTotal($amount, $interestRate)
    {
        return $amount + ($amount * $interestRate / 100);
    }
}