<?php

namespace App\Services;

use App\Repositories\RepaymentRepository;

class RepaymentService
{
    protected $repaymentRepository;

    public function __construct(RepaymentRepository $repaymentRepository)
    {
        $this->repaymentRepository = $repaymentRepository;
    }

    public function getAllRepayments()
    {
        return $this->repaymentRepository->getAll();
    }

    public function getRepaymentById($id)
    {
        return $this->repaymentRepository->findById($id);
    }

    public function createRepayment(array $data)
    {
        return $this->repaymentRepository->create($data);
    }

    public function updateRepayment($id, array $data)
    {
        return $this->repaymentRepository->update($id, $data);
    }

    public function deleteRepayment($id)
    {
        return $this->repaymentRepository->delete($id);
    }
}