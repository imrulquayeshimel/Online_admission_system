<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Admin\ApplicationDeadlines as AD;

class CreateApplicationDeadlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_deadlines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_season_id')->unsigned();
            $table->foreign('exam_season_id')->references('id')->on('exam_seasons')->onDelete('cascade');
            $table->date('deadline');
            $table->boolean('status')->default(AD::UNACCOMPLISHED);
            $table->boolean('is_published')->default(AD::UNPUBLISHED);
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
        Schema::dropIfExists('application_deadlines');
    }
}
