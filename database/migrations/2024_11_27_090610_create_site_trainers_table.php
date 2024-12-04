<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteTrainersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_trainers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trainer_name');
            $table->string('trainer_type');
            $table->text('image');
            $table->text('description');
            $table->text('facebook_link');
            $table->text('twitter');
            $table->text('linkedin');
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
        Schema::drop('site_trainers');
    }
}
