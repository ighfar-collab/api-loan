<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Resources\LoanResource;
use App\Services\LoanService;
use OpenApi\Annotations as OA;


class LoanController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/loans",
     *     summary="Get Loans",
     *     tags={"Loans"},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     )
     * )
     */

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

    /**
 * @OA\Post(
 *     path="/api/loans",
 *     summary="Create loan",
 *     tags={"Loans"},
 *     security={{"bearerAuth":{}}},
 *
 *     @OA\RequestBody(
 *         required=true,
 *
 *         @OA\JsonContent(
 *             required={"amount","interest_rate","due_date"},
 *
 *             @OA\Property(property="amount", type="integer", example=1000000),
 *             @OA\Property(property="interest_rate", type="integer", example=10),
 *             @OA\Property(property="due_date", type="string", example="2026-12-01")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="Loan created"
 *     )
 * )
 */
    public function store(StoreLoanRequest $request)
    {
        $loan = $this->loanService->createLoan([
            ...$request->validated(),
            'user_id' => auth()->id()
        ]);

        return new LoanResource($loan);
    }
}