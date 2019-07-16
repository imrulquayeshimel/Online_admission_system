<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->date('dob');
            $table->tinyInteger('gender')->nullable();
            $table->string('photo')->nullable();
            $table->integer('blood_group')->unsigned()->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number');
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('signature')->nullable();
            $table->string('reg_token')->nullable();
            $table->string('exam_roll')->nullable();
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('exam_season_id')->unsigned();
            $table->foreign('exam_season_id')->references('id')->on('exam_seasons')->onDelete('cascade');
            $table->boolean('status')->default(false);

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
        Schema::dropIfExists('students');
    }
}
