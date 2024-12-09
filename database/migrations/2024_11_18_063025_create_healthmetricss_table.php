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
            $table->date('measurement_date')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('bmi')->nullable();
            $table->string('bmi_status')->nullable();
            $table->string('body_fat_percentage')->nullable();
            $table->string('muscle_mass')->nullable();
            $table->string('hydration_level')->nullable();
            $table->string('chest')->nullable();
            $table->string('waist')->nullable();
            $table->string('hips')->nullable();
            $table->string('thighs')->nullable();
            $table->string('arms')->nullable();
            $table->string('forearms')->nullable();
            $table->string('neck')->nullable();
            $table->string('shoulders')->nullable();
            $table->string('calves')->nullable();
            $table->string('resting_heart_rate')->nullable();
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
