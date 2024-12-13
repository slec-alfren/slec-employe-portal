<?php

namespace App\Repositories;

use App\Models\Employee;
use App\DTOs\EmployeeDto;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository
{
    public function create(EmployeeDTO $dto): Employee
    {
        return Employee::create([
            'dtr_no' => $dto->dtr_no,
            'title' => $dto->title,
            'last_name' => $dto->last_name,
            'first_name' => $dto->first_name,
            'middle_name' => $dto->middle_name,
            'suffix' => $dto->suffix,
            'gender' => $dto->gender,
            'username' => $dto->username,
            'password' => Hash::make($dto->password),
            'department_id' => $dto->department_id,
            'designation_id' => $dto->designation_id,
            'prc_id' => $dto->prc_id,
            'job_level_id' => $dto->job_level_id,
            'floor_location' => $dto->floor_location,
            'active' => 1,
            'created_at' => now(),
        ]);
    }

    public function getAll()
    {
        return Employee::all();
    }
}