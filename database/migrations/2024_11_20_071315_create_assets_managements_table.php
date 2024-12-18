<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetsManagementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('assets_categories_id');
            $table->integer('branch_id');
            $table->string('asset_for');
            $table->string('item_quantity');
            $table->text('item_description');
            $table->string('location');
            $table->string('status');
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
        Schema::drop('assets_managements');
    }
}
