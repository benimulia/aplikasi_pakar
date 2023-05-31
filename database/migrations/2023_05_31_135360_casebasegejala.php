<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Casebasegejala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_case_gejala', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('base_case_id');
            $table->foreign('base_case_id')->references('id')->on('base_case');
            $table->unsignedBigInteger('gejala_id');
            $table->foreign('gejala_id')->references('id')->on('gejala');
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
        Schema::dropIfExists('base_case_gejala');
    }
}
