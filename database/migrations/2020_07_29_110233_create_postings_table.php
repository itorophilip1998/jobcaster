<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_type');
            $table->string('company_address');
            $table->text('job_description');
            $table->text('job_requirement');
            $table->string('company_name');
            $table->string('company_email');
            $table->string('salary_range');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('managers_id');
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
        Schema::dropIfExists('postings');
    }
}
