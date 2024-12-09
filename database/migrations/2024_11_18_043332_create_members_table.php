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
            $table->string('mem_cell')->nullable();
            $table->text('mem_email')->nullable();
            $table->string('mem_img_url')->nullable();
            $table->string('mem_type')->nullable();
            $table->string('punch_id')->nullable();
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
