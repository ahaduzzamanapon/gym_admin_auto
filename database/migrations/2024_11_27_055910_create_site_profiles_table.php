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
            $table->string('logo_name');
            $table->string('banner_status');
            $table->text('banner_image');
            $table->text('banner_video');
            $table->string('title');
            $table->string('small_banner_text');
            $table->string('big_banner_text');
            $table->string('fotter_text');
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
