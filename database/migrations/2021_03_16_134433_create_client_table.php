<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manage_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_husband')->nullable();
            $table->integer('age')->nullable();
            $table->string('email')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('visit_purpose')->nullable();
            $table->string('desire_country')->nullable();
            $table->string('travel_purpose')->nullable();
            $table->string('listen_score')->nullable();
            $table->string('write_score')->nullable();
            $table->string('read_score')->nullable();
            $table->string('speak_score')->nullable();
            $table->string('qualification')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('visa_applied_before')->nullable();
            $table->string('Preference')->nullable();
            $table->string('travel_history')->nullable();
            $table->string('referance')->nullable();
            $table->string('remark')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('client');
    }
}
