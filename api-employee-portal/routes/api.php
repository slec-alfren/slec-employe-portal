<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/test', function() {
    return response()->json(['message' => 'Test successful']);
});

// Route::get('/test1', [AuthController::class, 'getEmployees']);


Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/employees', [AuthController::class, 'getEmployees']);
    Route::get('/employee/{id}', [AuthController::class, 'getEmployeeById']);
});