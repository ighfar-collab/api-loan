<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRepaymentRequest;
use App\Http\Resources\RepaymentResource;
use App\Services\RepaymentService;
use Illuminate\Http\JsonResponse;

class RepaymentController extends Controller
{
    protected $repaymentService;

    public function __construct(RepaymentService $repaymentService)
    {
        $this->repaymentService = $repaymentService;
    }

    public function index()
    {
        $repayments = $this->repaymentService->getAllRepayments();

        return RepaymentResource::collection($repayments);
    }

    public function store(StoreRepaymentRequest $request): JsonResponse
    {
        $repayment = $this->repaymentService
            ->createRepayment($request->validated());

        return response()->json([
            'message' => 'Repayment created successfully',
            'data' => new RepaymentResource($repayment),
        ], 201);
    }

    public function show($id)
    {
        $repayment = $this->repaymentService
            ->getRepaymentById($id);

        return new RepaymentResource($repayment);
    }

    public function update(StoreRepaymentRequest $request, $id): JsonResponse
    {
        $repayment = $this->repaymentService
            ->updateRepayment($id, $request->validated());

        return response()->json([
            'message' => 'Repayment updated successfully',
            'data' => new RepaymentResource($repayment),
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $this->repaymentService->deleteRepayment($id);

        return response()->json([
            'message' => 'Repayment deleted successfully',
        ]);
    }
}