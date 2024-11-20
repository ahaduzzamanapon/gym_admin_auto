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
        Schema::create('gym_meal_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diet_chart_id')->constrained('gym_diet_charts')->cascadeOnDelete();
            $table->string('meal_name');
            $table->string('meal_time');
            $table->text('food_items');
            $table->float('quantity');
            $table->float('calories');
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
        Schema::dropIfExists('gym_meal_plans');
    }
};
