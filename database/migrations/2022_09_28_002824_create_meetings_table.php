<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file')->nullable();
            $table->string('duration')->nullable();
            $table->text('details')->nullable();
            $table->text('agenda')->nullable();
            $table->text('sarok')->nullable();
            $table->dateTime('schedule');
            $table->string('location')->nullable();
            $table->string('type');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('employee_type');
            $table->json('employees')->nullable();
            $table->foreignId('department_id')->nullable()->constrained('departments')->cascadeOnDelete();
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
        Schema::dropIfExists('meetings');
    }
}
