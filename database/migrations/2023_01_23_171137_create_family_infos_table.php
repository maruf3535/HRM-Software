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
        Schema::create('family_infos', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->string('first_name', 35)->nullable();
            $table->string('middle_name', 35)->nullable();
            $table->string('last_name', 35)->nullable();
            $table->string('mobile_no', 15)->nullable();
            $table->string('nid_no', 20)->nullable();
            $table->foreignId('relation')->nullable()->references('id')->on('user_relations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('family_infos');
    }
};
