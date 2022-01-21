<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_basics_id');
            $table->string('height');
            $table->string('weight');
            $table->string('blood');
            $table->string('blood_pressure');
            $table->string('pulse');
            $table->string('respiration');
            $table->string('allergy');
            $table->string('diet');
            $table->timestamps();
            $table->foreign('patient_basics_id')->references('id')->on('patient_basics')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_medicals');
    }
}
