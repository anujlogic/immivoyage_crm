<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCloumsToIelts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ielts', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_no')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->string('education')->nullable();
            $table->string('age')->nullable();
            $table->string('work_exp')->nullable();
            $table->string('travel_history')->nullable();
            $table->string('refusal_before')->nullable();
            $table->string('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ielts', function (Blueprint $table) {
            Schema::dropIfExists('ielts');
        });
    }
}
