<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnswerToAssignedTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigned_test', function (Blueprint $table) {
            $table->string('answer')->default();
            $table->string('marks')->default();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assigned_test', function (Blueprint $table){
            $table->string('answer')->nullable();
            $table->string('marks')->nullable();
        });
    }
}
