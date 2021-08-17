<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_category')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->boolean('age')->default(0);
            $table->string('qualification')->nullable();
            $table->string('address')->nullable();
            $table->string('call_purpose')->nullable();
            $table->enum('enroll', ['yes', 'no'])->default('no');
            $table->string('visa_category')->nullable();
            $table->string('required_test')->nullable();
            $table->boolean('require_band')->default(0);
            $table->string('ielts_score')->nullable();
            $table->boolean('read')->default(0);
            $table->boolean('wirte')->default(0);
            $table->boolean('speak')->default(0);
            $table->boolean('listen')->default(0);
            $table->string('country')->nullable();
            $table->integer('manage_by')->default(0);
            $table->string('feed_back')->nullable();
            $table->string('follow_up')->nullable();
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
        Schema::dropIfExists('call_leads');
    }
}
