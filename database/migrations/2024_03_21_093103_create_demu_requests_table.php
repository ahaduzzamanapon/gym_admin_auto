<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demu_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('company_name')->nullable();
            $table->string('company_size')->nullable();
            $table->string('module')->nullable();
            $table->string('region')->nullable();
            $table->unsignedTinyInteger('status')->comment('0: pending, 1: accepted');
            $table->string('service')->comment('0: RMS HRM, 1: Corporate HRM');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demu_requests');
    }
};
