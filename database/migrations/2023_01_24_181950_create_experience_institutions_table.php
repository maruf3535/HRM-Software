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
        Schema::create('experience_institutions', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name', 200)->nullable();
            $table->string('designation', 200)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('responsibility', 255)->nullable();
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
        Schema::dropIfExists('experience_institutions');
    }
};
