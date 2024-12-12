<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_employee_account', function (Blueprint $table) {
            $table->integer('id', 11)->autoIncrement();
            $table->char('dtr_no', 10);
            $table->char('title', 8)->nullable();
            $table->char('last_name', 50);
            $table->char('first_name', 50);
            $table->char('middle_name', 50)->nullable();
            $table->char('suffix', 6)->nullable();
            $table->char('gender', 10);
            $table->char('username', 10);
            $table->string('password', 250);
            $table->integer('department_id');
            $table->integer('designation_id');
            $table->char('prc_id', 10)->nullable();
            $table->tinyInteger('job_level_id')->nullable();
            $table->char('floor_location', 100);
            $table->tinyInteger('active');
            $table->datetime('created_at');
            $table->datetime('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};