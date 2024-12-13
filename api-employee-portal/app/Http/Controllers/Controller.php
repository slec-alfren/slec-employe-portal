<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;

abstract class Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    protected function registerEmployee(Request $request)
    {
        return $this->employeeService->registerEmployee($request);
    }

    protected function getEmployees(Request $request)
    {
        return $this->employeeService->getEmployees($request);
    }
}
