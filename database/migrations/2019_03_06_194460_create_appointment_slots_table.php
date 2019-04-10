<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('start time');
            $table->boolean('Booking status');
            $table->unsignedBigInteger('timeslot_id');
            $table->timestamps();
            $table->foreign('timeslot_id')->references('id')->on('timeslots')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_slots');
    }
}
