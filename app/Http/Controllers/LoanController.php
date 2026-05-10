<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    public function index()
    {
        return response()->json(
            Loan::latest()->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'status' => 'required',
            'due_date' => 'required|date'
        ]);

        $loan = Loan::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'interest_rate' => $request->interest_rate,
            'status' => $request->status,
            'due_date' => $request->due_date
        ]);

        return response()->json($loan, 201);
    }

    public function show($id)
    {
        return response()->json(
            Loan::findOrFail($id)
        );
    }

    public function update(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);

        $loan->update($request->all());

        return response()->json($loan);
    }

    public function destroy($id)
    {
        Loan::destroy($id);

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}