<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();

            $table->foreignId('position_id')->nullable()->constrained('positions')->cascadeOnDelete();
            $table->foreignId('department_id')->nulllable()->constrained('departments')->cascadeOnDelete();
            $table->string('current_grade')->nullable();
            $table->string('phone')->nullable();
            $table->string('uid')->nullable();
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('birth_date')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
