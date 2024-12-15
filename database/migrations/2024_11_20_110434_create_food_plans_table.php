<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_plan_id');
            $table->string('meal_name', 100);
            $table->string('meal_time');
            $table->text('food_items');
            $table->string('quantity');
            $table->integer('calories');
            $table->timestamps();
            $table->foreign('meal_plan_id')->references('id')->on('meal_plans')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_plans');
    }
};
