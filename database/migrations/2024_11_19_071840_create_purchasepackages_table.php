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
            $table->integer('coupons_id');
            $table->integer('amount');
            $table->integer('tax');
            $table->integer('coupon_amount');
            $table->integer('gross_amount');
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
