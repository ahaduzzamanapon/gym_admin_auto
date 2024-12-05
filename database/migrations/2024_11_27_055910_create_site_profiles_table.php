<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo_name')->nullable();
            $table->string('banner_status')->nullable();
            $table->text('banner_image')->nullable();
            $table->text('banner_video')->nullable();
            $table->string('title')->nullable();
            $table->string('small_banner_text')->nullable();
            $table->string('big_banner_text')->nullable();
            $table->string('fotter_text')->nullable();
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
        Schema::drop('site_profiles');
    }
}
