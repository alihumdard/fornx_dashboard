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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_name', 100);
            $table->char('country_code', 2)->nullable();
            $table->char('iso_code', 3)->nullable();
            $table->string('phone_code', 10)->nullable();
            $table->char('currency_code', 3)->nullable();
            $table->string('currency_name', 50)->nullable();
            $table->string('continent', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
