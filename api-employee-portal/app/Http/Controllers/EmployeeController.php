<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function register(Request $request)
    {
        return parent::registerEmployee($request);
    }

    public function getEmployees(Request $request)
    {
        return parent::getEmployees($request);
    }
}