<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('nationality');
            $table->string('state');
            $table->date('dob');
            $table->string('gender');
            $table->text('about_you');
            $table->string('cv');
            $table->string('qualification');
            $table->string('experience');
            $table->bigInteger('post_id');
            $table->bigInteger('manager_id');
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
        Schema::dropIfExists('apply_jobs');
    }
}
