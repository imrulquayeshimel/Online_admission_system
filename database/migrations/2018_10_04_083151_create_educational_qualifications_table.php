<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('ssc_board')->nullable();
            $table->string('ssc_name_of_institute')->nullable();
            $table->string('ssc_passing_year')->nullable();
            $table->string('ssc_gpa')->nullable();
            $table->string('ssc_marksheet')->nullable();
            $table->string('hsc_board')->nullable();
            $table->string('hsc_name_of_institute')->nullable();
            $table->string('hsc_passing_year')->nullable();
            $table->string('hsc_gpa')->nullable();
            $table->string('hsc_marksheet')->nullable();
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
        Schema::dropIfExists('educational_qualifications');
    }
}
