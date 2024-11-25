<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHealthmetricssTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthmetricss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned();
            $table->date('measurement_date');
            $table->string('weight');
            $table->string('height');
            $table->string('bmi');
            $table->string('body_fat_percentage');
            $table->string('muscle_mass');
            $table->string('hydration_level');
            $table->string('chest');
            $table->string('waist');
            $table->string('hips');
            $table->string('thighs');
            $table->string('arms');
            $table->string('forearms');
            $table->string('neck');
            $table->string('shoulders');
            $table->string('calves');
            $table->string('resting_heart_rate');
            $table->timestamps();
            // $table->foreign('member_id')->references('id')->on('members.id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('healthmetricss');
    }
}
