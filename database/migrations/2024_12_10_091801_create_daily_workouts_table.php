<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDailyWorkoutsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_workouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('daily_work_out_details_id');
            // $table->string('day');
            // $table->string('duration');
            $table->integer('workout_category');
            $table->string('exercise_name');
            $table->string('reputation');
            $table->string('sets');
            $table->string('duration_minutes');
            $table->string('create_by');
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
        Schema::drop('daily_workouts');
    }
}
