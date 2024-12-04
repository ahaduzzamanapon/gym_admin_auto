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
            Schema::create('gym_diet_charts', function (Blueprint $table) {
                $table->id();
                $table->integer('member_id');
                $table->string('member_name', 100);
                $table->integer('age');
                $table->enum('gender', ['Male', 'Female', 'Other']);
                $table->float('height');
                $table->float('weight');
                $table->float('body_fat_percentage')->nullable();
                $table->enum('goal', ['Weight Loss', 'Muscle Gain', 'Maintenance', 'Other']);
                $table->enum('meal_preference', ['Vegetarian', 'Non-Vegetarian', 'Vegan', 'Pescatarian', 'Other']);
                $table->integer('caloric_requirement');
                $table->float('protein_grams')->nullable();
                $table->float('carbs_grams')->nullable();
                $table->float('fats_grams')->nullable();
                $table->float('water_intake')->nullable();
                $table->text('special_instructions')->nullable();
                $table->integer('meal_plan_id')->nullable();
                $table->date('from_date')->nullable();
                $table->date('to_date')->nullable();
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
        Schema::dropIfExists('gym_diet_charts');
    }
};
