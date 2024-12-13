<?php

namespace App\DTOs;

class EmployeeDTO
{
    public function __construct(
        public string $dtr_no,
        public ?string $title,
        public string $last_name,
        public string $first_name,
        public ?string $middle_name,
        public ?string $suffix,
        public string $gender,
        public string $username,
        public string $password,
        public int $department_id,
        public int $designation_id,
        public ?string $prc_id,
        public ?int $job_level_id,
        public string $floor_location
    ) {}

    public static function fromRequest(array $request): self
    {
        return new self(
            dtr_no: $request['dtr_no'],
            title: $request['title'],
            last_name: $request['last_name'],
            first_name: $request['first_name'],
            middle_name: $request['middle_name'],
            suffix: $request['suffix'],
            gender: $request['gender'],
            username: $request['username'],
            password: $request['password'],
            department_id: $request['department_id'],
            designation_id: $request['designation_id'],
            prc_id: $request['prc_id'],
            job_level_id: $request['job_level_id'],
            floor_location: $request['floor_location']
        );
    }
}