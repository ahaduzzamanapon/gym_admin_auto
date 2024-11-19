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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('call_number')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('yeras_of_experience')->nullable();
            $table->string('total_clients')->nullable();
            $table->string('rmg_sector')->nullable();
            $table->string('hr_pdf')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
