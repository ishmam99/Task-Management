<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensions', function (Blueprint $table) {
            $table->id();
            $table->string('id_no')->nullable();
            $table->string('name')->nullable();
             $table->string('month')->nullable();
            $table->double('pension')->nullable();
            $table->double('basic')->nullable();
            $table->string('scale')->nullable();
            $table->double('treatment_cost')->nullable();
            $table->double('festival_allowance')->nullable();
            $table->double('boishaki')->nullable();
            $table->double('bonus')->nullable();
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
        Schema::dropIfExists('pensions');
    }
}
