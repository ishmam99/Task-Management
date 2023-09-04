<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->double('basic')->default(0.0);
            $table->double('house_rent')->default(0.0);
            $table->double('medical')->default(0.0);
            $table->double('education')->default(0.0);
            $table->double('charge_allow')->default(0.0);
            $table->double('entertainment')->default(0.0);
            $table->double('mobile')->default(0.0);
            $table->double('telephone')->default(0.0);
            $table->double('washing')->default(0.0);
            $table->double('conveyance')->default(0.0);
            $table->double('tiffin')->default(0.0);
            $table->double('car_maintenance')->default(0.0);
            $table->double('group_insurance')->default(0.0);
            $table->double('pf_loan')->default(0.0);
            $table->double('provident_fund')->default(0.0);
            $table->double('house_building_loan')->default(0.0);
            $table->double('house_repairing_loan')->default(0.0);
            $table->double('car_loan')->default(0.0);
            $table->double('motor_cycle_loan')->default(0.0);
            $table->double('bi_cycle_loan')->default(0.0);
            $table->double('computer_loan')->default(0.0);
            $table->double('welfare_loan')->default(0.0);
            $table->double('income_tax')->default(0.0);
            $table->double('transport')->default(0.0);
            $table->double('group_insurance_deduction')->default(0.0);
            $table->double('benevolent_fund')->default(0.0);
            $table->double('municipal_tax')->default(0.0);
            $table->double('water_bill')->default(0.0);
            $table->double('gas_bill')->default(0.0);
            $table->double('revenue_stamp')->default(0.0);
            $table->double('officer_welfare_assoc')->default(0.0);
            $table->double('union_subscription')->default(0.0);
            $table->double('others')->default(0.0);
            $table->double('dearness')->default(0.0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('payrolls');
    }
}
