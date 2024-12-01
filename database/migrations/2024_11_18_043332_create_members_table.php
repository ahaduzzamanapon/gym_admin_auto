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
            $table->string('mem_father');
            $table->string('mem_mother');
            $table->string('mem_gender');
            $table->string('mem_address');
            $table->date('mem_admission_date');
            $table->string('mem_cell');
            $table->text('mem_email');
            $table->string('mem_img_url');
            $table->string('mem_type');
            $table->string('punch_id');
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
