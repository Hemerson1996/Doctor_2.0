<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionistAvatarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptionist_avatars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receptionist_basics_id');
            $table->string('img_avatar');
            $table->timestamps();
            $table->foreign('receptionist_basics_id')->references('id')->on('receptionist_basics')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receptionist_avatars');
    }
}
