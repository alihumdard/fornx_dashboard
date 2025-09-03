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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('invoice_number')->unique();
            $table->string('reference')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('subject')->nullable();
            $table->date('invoice_date');
            $table->date('due_date');
            $table->unsignedBigInteger('invoice_template_id');
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default('draft'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
