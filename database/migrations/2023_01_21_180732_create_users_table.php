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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 35);
            $table->string('middle_name', 35)->nullable();
            $table->string('last_name', 35)->nullable();
            $table->string('nickname', 35)->nullable();
            $table->enum('gender', [0, 1, 2, 9]); // 0=not known; 1=male; 2=female; 9=not applicable
            $table->date('dob');            
            $table->string('email', 255)->unique()->nullable();
            $table->string('alter_email', 255)->unique()->nullable();
            $table->string('mobile_no', 15);
            $table->string('phone_no', 15)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
