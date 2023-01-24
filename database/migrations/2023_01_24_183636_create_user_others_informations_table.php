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
        Schema::create('user_others_informations', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('blood_group')->nullable()->references('id')->on('blood_groups');
            $table->foreignId('religion')->nullable()->references('id')->on('religions');
            $table->foreignId('nationality')->nullable()->references('id')->on('nationalities');
            $table->foreignId('marital_status')->nullable()->references('id')->on('marital_statuses');
            $table->string('nid_no', 20)->nullable();
            $table->string('passport_no', 20)->nullable();
            $table->foreignId('birth_country')->nullable()->references('id')->on('birth_countries');
            $table->string('birth_place', 100)->nullable();
            $table->datetime('last_medical_check')->nullable();
            $table->string('last_medical_status', 255)->nullable();
            $table->string('medical_history', 255)->nullable();
            $table->string('driving_license_no', 30)->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_others_informations');
    }
};
