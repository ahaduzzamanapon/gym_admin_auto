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
        Schema::create('sales_product_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id');
            $table->foreignId('member_id');
            $table->date('sale_date');
            $table->decimal('subtotal');
            $table->decimal('discount');
            $table->decimal('tax');
            $table->decimal('total_amount');
            $table->string('payment_method');
            $table->string('status');
            $table->text('payment_note');
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
        Schema::drop('sales_product_models');
    }
};
