<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMultiBranchsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_branchs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branch_name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('manager_name');
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
        Schema::drop('multi_branchs');
    }
}
