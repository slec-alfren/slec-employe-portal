<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmployeeController;

Route::get('/server', function() {
    return response()->json([
        'status' => 'success',
        'message' => 'Server is running',
        'port' => env('PORT')
    ]);
});

// Route::get('/test1', [AuthController::class, 'getEmployees']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [EmployeeController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/employees', [EmployeeController::class, 'getEmployees']);
    Route::get('/employee/{id}', [AuthController::class, 'getEmployeeById']);
});