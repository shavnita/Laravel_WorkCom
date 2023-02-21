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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained();
            $table->string('workman_name');
            $table->string('workman_gender');
            $table->integer('workman_age');
            $table->string('workman_occupation');
            $table->text('workman_address');
            $table->string('accident_time');
            $table->text('accident_place');
            $table->text('accident_information');
            $table->foreignId('accident_id')->constrained();
            $table->foreignId('injury_id')->constrained();
            $table->text('hospital_name');
            $table->text('doctor_name');
            $table->text('action_taken');
            $table->foreignId('category_id')->constrained();
            $table->double('weekly_wage');
            $table->double('weekly_ration');
            $table->double('weekly_housing');
            $table->double('weekly_fuel');
            $table->double('weekly_overtime');
            $table->double('weekly_gross');
            $table->string('effective_date');
            $table->integer('days_lost');
            $table->double('temp_incapacity_amout');
            $table->double('temp_incapacity_medical');
            $table->double('temp_incapacity_transport');
            $table->double('permanent_partial_incapacity');
            $table->double('permanent_total_incapacity');
            $table->double('occupational_disease');
            $table->double('total_compensation_amount');
            $table->text('extra_notes');
            $table->string('accident_serial_number');
            $table->string('station');
            $table->string('officer_responsible');
            $table->text('application_status');
            $table->string('entered_by');
            $table->timestampTz('entered_date');
            $table->string('updated_by');
            $table->timestampsTz();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
