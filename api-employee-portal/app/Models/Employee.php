<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, Notifiable;
      // Add this line to specify the table name
      protected $table = 'tbl_employee_account';

      // If your primary key is not 'id' or is not auto-incrementing, specify it:
      protected $primaryKey = 'id';
      public $incrementing = true;

    protected $fillable = [
        'dtr_no',
        'title',
        'last_name',
        'first_name',
        'middle_name',
        'suffix',
        'gender',
        'username',
        'password',
        'department_id',
        'designation_id',
        'prc_id',
        'job_level_id',
        'floor_location',
        'active',
    ];

    protected $hidden = [
        'password',
    ];
}