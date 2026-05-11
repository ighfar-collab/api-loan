<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\API\RepaymentController;

//Route::apiResource('repayments', RepaymentController::class);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

  //  Route::apiResource('loans', LoanController::class);
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

  Route::apiResource('loans', LoanController::class);
    Route::apiResource('repayments', RepaymentController::class);

});