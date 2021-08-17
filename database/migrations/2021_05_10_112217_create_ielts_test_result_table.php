<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIeltsTestResultTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ielts_test_result', function (Blueprint $table) {
            $table->id();
            $table->integer('assign_id')->default(0);
            $table->integer('student_id')->default(0);
            $table->integer('tutor_id')->default(0);
            $table->integer('test_id')->default(0);
            $table->integer('answer')->default(0);
            $table->string('marks')->default(0);
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
        Schema::dropIfExists('ielts_test_result');
    }
}
