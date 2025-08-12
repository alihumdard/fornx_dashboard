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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('clint_name');
            $table->string('country');
            // platform
            $table->foreignId('platform_id')->nullable()->constrained('platforms')->onDelete('set null');
            // technology
            $table->foreignId('technology_id')->nullable()->constrained('technologies')->onDelete('set null');
            // description
            $table->string('priority')->default('low'); // Default priority
            // start date
            $table->date('start_date')->nullable();
            // end date
            $table->date('end_date')->nullable();
            // earn from project
            $table->decimal('earn_from_project', 10, 2)->default(0.00);
            // paid to outside
            $table->decimal('paid_to_outside', 10, 2)->default(0.00);
            // work done by
            $table->string('work_done_by')->nullable();
            // project guide
            $table->string('project_guide')->nullable();
            // status 
            $table->string('status')->default('pending');
            // progress
            $table->integer('progress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
