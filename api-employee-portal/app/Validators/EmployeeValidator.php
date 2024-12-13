<?php

namespace App\Validators;

use Illuminate\Http\Request;

class EmployeeValidator
{
    public static function validate(Request $request): array
    {
        return $request->validate([
            'dtr_no' => 'required|string|max:10',
            'title' => 'nullable|string|max:8',
            'last_name' => 'required|string|max:50',
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'suffix' => 'nullable|string|max:6',
            'gender' => 'required|string|max:10',
            'username' => 'required|string|max:10|unique:tbl_employee_account',
            'password' => 'required|string|min:8|max:250',
              //validation for department and designation
                //'department_id' => 'required|integer|exists:departments,id',
                //'designation_id' => 'required|integer|exists:designations,id',
            'department_id' => 'required|integer',
            'designation_id' => 'required|integer',
            'prc_id' => 'nullable|string|max:7',
            'job_level_id' => 'nullable|integer',
            'floor_location' => 'required|string|max:100',
        ]);
    }
}