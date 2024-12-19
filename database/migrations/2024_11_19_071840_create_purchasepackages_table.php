<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasepackagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasepackages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->integer('package_id');
            $table->integer('coupons_id')->nullable();
            $table->integer('amount');
            $table->integer('tax');
            $table->integer('coupon_amount')->nullable();
            $table->integer('gross_amount');
            $table->integer('pay_amount');
            $table->integer('due_amount');
            $table->integer('status')->comment('1 for pending, 2 for due, 3 for fully payment');
            $table->date('expired_date')->nullable();
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
        Schema::drop('purchasepackages');
    }
}
