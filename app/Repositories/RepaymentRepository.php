<?php

namespace App\Repositories;

use App\Models\Repayment;

class RepaymentRepository
{
    public function getAll()
    {
        return Repayment::latest()->get();
    }

    public function findById($id)
    {
        return Repayment::findOrFail($id);
    }

    public function create(array $data)
    {
        return Repayment::create($data);
    }

    public function update($id, array $data)
    {
        $repayment = $this->findById($id);

        $repayment->update($data);

        return $repayment;
    }

    public function delete($id)
    {
        $repayment = $this->findById($id);

        return $repayment->delete();
    }
}