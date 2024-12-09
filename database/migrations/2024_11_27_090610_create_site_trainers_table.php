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
            $table->string('trainer_type')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
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
