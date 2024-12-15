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
        Schema::create('sales_product_item_models', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('sale_id')->constrained('sales_product_models')->onDelete('cascade');
            $table->foreignId('product_id');
            $table->string('product_name', 255)->notNullable();
            $table->integer('quantity')->notNullable()->default(1);
            $table->decimal('unit_price', 10, 2)->notNullable();
            $table->decimal('total_price', 10, 2)->storedAs('quantity * unit_price');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_product_item_models');
    }
};
