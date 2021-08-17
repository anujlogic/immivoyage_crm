<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_images', function (Blueprint $table) {
            $table->id();
            $table->string('passport_size_img')->nullable();
            $table->string('passport_front_img')->nullable();
            $table->string('passport_back_img')->nullable();
            $table->string('matric_img')->nullable();
            $table->string('plus_two_img')->nullable();
            $table->string('diploma_img')->nullable();
            $table->string('graduation_img')->nullable();
            $table->string('masters_img')->nullable();
            $table->string('ielts_img')->nullable();
            $table->string('id_proof_img')->nullable();
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
        Schema::dropIfExists('client_images');
    }
}
