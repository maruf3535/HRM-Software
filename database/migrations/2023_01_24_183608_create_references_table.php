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
        Schema::create('references', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->string('reference_name', 35)->nullable();
            $table->string('designation', 200)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('additional_address', 255)->nullable();
            $table->string('additional_address2', 255)->nullable();
            $table->string('resident_phone', 15)->nullable();
            $table->string('off_phone', 15)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('additional_mobile', 15)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('relation', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('references');
    }
};
