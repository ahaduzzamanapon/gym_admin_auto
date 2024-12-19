<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_unique_id');
            $table->string('mem_name');
            $table->string('mem_father')->nullable();
            $table->string('mem_mother')->nullable();
            $table->string('mem_gender')->nullable();
            $table->string('mem_address')->nullable();
            $table->date('mem_admission_date')->nullable();
            $table->string('mem_admission_fees')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('mem_cell')->nullable();
            $table->text('mem_email')->nullable();
            $table->string('mem_img_url')->nullable();
            $table->string('mem_type')->nullable();
            $table->string('punch_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->string('height')->nullable(); // Height in cm
            $table->string('weight')->nullable(); // Weight in kg
            $table->string('bmi')->nullable(); // Weight in kg
            $table->string('waist')->nullable(); // Weight in kg
            $table->string('blood_group')->nullable(); // Blood Group
            $table->string('blood_pressure')->nullable(); // Blood Group
            $table->string('pulse_rate')->nullable(); // Blood Group
            $table->string('profession')->nullable(); // Profession
            $table->string('office_address')->nullable(); // Office Address
            $table->text('exercise_goal')->nullable(); // Exercise Goal
            $table->string('current_diet_routine')->nullable(); // Current Diet Routine
            $table->string('sassoon_exercise_time')->nullable(); // Weekly Exercise Time
            $table->string('sleep_time')->nullable(); // Wake Up Time
            $table->string('wake_up_time')->nullable(); // Wake Up Time
            $table->string('work_time')->nullable(); // Lifestyle or Posture
            $table->text('exercise_history')->nullable(); // Exercise History
            $table->text('medicine_history')->nullable(); // Medicine History
            $table->text('injury_or_health_issue')->nullable(); // Injury/Health Issues
            $table->text('like_or_dislike_exercise')->nullable(); // Injury/Health Issues
            $table->text('like_or_dislike_food')->nullable(); // Injury/Health Issues
            $table->text('push_up_count')->nullable(); // Injury/Health Issues
            $table->text('pull_up_count')->nullable(); // Injury/Health Issues
            $table->text('lift_count_kg')->nullable(); // Injury/Health Issues
            $table->text('question')->nullable(); // Injury/Health Issues
            $table->text('term_con')->nullable(); // Injury/Health Issues
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
        Schema::drop('members');
    }
}
