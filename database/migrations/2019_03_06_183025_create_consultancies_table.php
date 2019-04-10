<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('doctor_id');
            $table->timestamp('start time');
            $table->timestamp('end time')->nullable();
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultancies');
    }
}
