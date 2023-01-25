<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_information', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('department_id')->nullable()->references('id')->on('departments');
            $table->foreignId('employee_type_id')->references('id')->on('employee_types');
            $table->foreignId('employee_position_id')->references('id')->on('employee_positions');
            $table->string('work_phone', 15)->nullable();
            $table->time('in_time');
            $table->time('out_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employment_information');
    }
};
