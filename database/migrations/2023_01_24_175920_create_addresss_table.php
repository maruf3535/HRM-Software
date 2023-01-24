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
        Schema::create('addresss', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->string('holding_no', 20)->nullable();
            $table->string('road_no', 20)->nullable();
            $table->string('area', 20)->nullable();
            $table->string('post_code', 10)->nullable();
            $table->integer('same_as_present')->nullable();
            $table->foreignID('type')->nullable()->references('id')->on('address_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresss');
    }
};
