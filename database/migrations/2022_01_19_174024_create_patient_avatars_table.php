<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientAvatarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_avatars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_basics_id');
            $table->string('img_avatar');
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
        Schema::dropIfExists('patient_avatars');
    }
}
