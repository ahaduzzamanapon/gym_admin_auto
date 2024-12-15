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
            $table->date('sale_date')->nullable();
            $table->decimal('subtotal')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('tax')->nullable();
            $table->decimal('total_amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->nullable();
            $table->text('payment_note')->nullable();
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
