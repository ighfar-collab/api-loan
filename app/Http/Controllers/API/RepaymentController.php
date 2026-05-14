<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRepaymentRequest;
use App\Http\Resources\RepaymentResource;
use App\Services\RepaymentService;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;


class RepaymentController extends Controller
{
    protected $repaymentService;

    public function __construct(RepaymentService $repaymentService)
    {
        $this->repaymentService = $repaymentService;
    }
      /**
     * @OA\Get(
     *     path="/api/repayments",
     *     summary="Get all repayments",
     *     tags={"Repayments"},
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\Response(
     *         response=200,
     *         description="List repayments"
     *     )
     * )
     */

    public function index()
    {
        $repayments = $this->repaymentService->getAllRepayments();

        return RepaymentResource::collection($repayments);
    }

    /**
     * @OA\Post(
     *     path="/api/repayments",
     *     summary="Create repayment",
     *     tags={"Repayments"},
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"loan_id","amount_paid"},
     *
     *             @OA\Property(
     *                 property="loan_id",
     *                 type="integer",
     *                 example=1
     *             ),
     *
     *             @OA\Property(
     *                 property="amount_paid",
     *                 type="integer",
     *                 example=500000
     *             )
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Repayment created"
     *     )
     * )
     */

    public function store(StoreRepaymentRequest $request): JsonResponse
    {
        $repayment = $this->repaymentService
            ->createRepayment($request->validated());

        return response()->json([
            'message' => 'Repayment created successfully',
            'data' => new RepaymentResource($repayment),
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/repayments/{id}",
     *     summary="Show repayment detail",
     *     tags={"Repayments"},
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Repayment ID",
     *
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Repayment detail"
     *     )
     * )
     */
    
    public function show($id)
    {
        $repayment = $this->repaymentService
            ->getRepaymentById($id);

        return new RepaymentResource($repayment);
    }

    /**
     * @OA\Put(
     *     path="/api/repayments/{id}",
     *     summary="Update repayment",
     *     tags={"Repayments"},
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="amount",
     *                 type="integer",
     *                 example=700000
     *             )
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Repayment updated"
     *     )
     * )
     */
    public function update(StoreRepaymentRequest $request, $id): JsonResponse
    {
        $repayment = $this->repaymentService
            ->updateRepayment($id, $request->validated());

        return response()->json([
            'message' => 'Repayment updated successfully',
            'data' => new RepaymentResource($repayment),
        ]);
    }
              
    /**
     * @OA\Delete(
     *     path="/api/repayments/{id}",
     *     summary="Delete repayment",
     *     tags={"Repayments"},
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Repayment deleted"
     *     )
     * )
     */
    public function destroy($id): JsonResponse
    {
        $this->repaymentService->deleteRepayment($id);

        return response()->json([
            'message' => 'Repayment deleted successfully',
        ]);
    }
}