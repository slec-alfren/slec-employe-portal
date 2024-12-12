<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_employee_account')->insert([
            [
                'dtr_no' => 'DTR001',
                'title' => 'Mr.',
                'last_name' => 'Admin',
                'first_name' => 'System',
                'middle_name' => null,
                'suffix' => null,
                'gender' => 'Male',
                'username' => 'admin',
                'password' => Hash::make('password123'),
                'department_id' => 1,
                'designation_id' => 1,
                'prc_id' => null,
                'job_level_id' => 1,
                'floor_location' => '1st Floor',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'dtr_no' => 'DTR002',
                'title' => 'Ms.',
                'last_name' => 'Doe',
                'first_name' => 'Jane',
                'middle_name' => 'Smith',
                'suffix' => null,
                'gender' => 'Female',
                'username' => 'jane.doe',
                'password' => Hash::make('password123'),
                'department_id' => 2,
                'designation_id' => 2,
                'prc_id' => 'PRC123456',
                'job_level_id' => 2,
                'floor_location' => '2nd Floor',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
        ]);
    }
}