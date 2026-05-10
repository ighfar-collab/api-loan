<?php

namespace App\Repositories;

use App\Models\Loan;

class LoanRepository implements LoanRepositoryInterface
{
    public function getAll()
    {
        return Loan::latest()->get();
    }

    public function findById($id)
    {
        return Loan::findOrFail($id);
    }

    public function create(array $data)
    {
        return Loan::create($data);
    }

    public function update($id, array $data)
    {
        $loan = Loan::findOrFail($id);

        $loan->update($data);

        return $loan;
    }

    public function delete($id)
    {
        return Loan::destroy($id);
    }
}