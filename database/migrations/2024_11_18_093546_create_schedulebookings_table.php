<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulebookingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedulebookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('asset_id');
            $table->string('service_type')->nullable();
            $table->integer('status');
            $table->text('note');
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
        Schema::drop('schedulebookings');
    }
}
