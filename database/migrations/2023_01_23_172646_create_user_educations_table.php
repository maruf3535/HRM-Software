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
        Schema::create('user_educations', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('qualification_type')->nullable()->references('id')->on('qualification_types');
            $table->foreignId('major')->nullable()->references('id')->on('education_majors');
            $table->foreignId('institution')->nullable()->references('id')->on('education_institutions');
            $table->foreignId('board')->nullable()->references('id')->on('education_boards');
            $table->string('passing_year', 4)->nullable();
            $table->string('result', 5)->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_educations');
    }
};
