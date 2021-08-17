<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaipsNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caips_note', function (Blueprint $table){
            $table->id();
            $table->string('name')->default(0);
            $table->string('email')->default(0);
            $table->string('contact_no')->default(0);
            $table->string('passport_no')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('notes_file')->nullable();
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
        Schema::dropIfExists('caips_note');
    }
}
 
