<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->string('bangla_name')->nullable();
            $table->string('govt_id')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();

            $table->string('prlLprDate')->nullable();
            $table->string('homeDistrict')->nullable();
            $table->date('orderDate')->nullable();
            $table->string('cadre')->nullable();
            $table->date('cadreDate')->nullable();
            $table->string('starting_grade')->nullable();

            $table->date('current_grade_date')->nullable();
            $table->string('batch')->nullable();
            $table->date('confirmationGODate')->nullable();
            $table->string('religion')->nullable();
            $table->string('maritalStat')->nullable();
            $table->string('nid')->nullable();
            $table->string('freedomFighter')->nullable();
            $table->string('spouseName')->nullable();
            $table->string('spouseHomeDist')->nullable();
            $table->string('spouseOccupation')->nullable();
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
        Schema::dropIfExists('employee_infos');
    }
}
