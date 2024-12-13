<?php

namespace App\Services;

use App\DTOs\EmployeeDto;
use App\Validators\EmployeeValidator;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeService
{
    public function __construct(
        private EmployeeRepository $repository
    ) {}

    public function registerEmployee(Request $request)
    {
        try {
            $validatedData = EmployeeValidator::validate($request);
            $employeeDTO = EmployeeDto::fromRequest($validatedData);
            $employee = $this->repository->create($employeeDTO);
            
            return response()->json([
                'status'=> 'success',
                'message' => 'Employee registered successfully',
                'data' => $employee
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }
    
    public function getEmployees()
    {
        try {
            $employees = $this->repository->getAll();
            return response()->json($employees);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}