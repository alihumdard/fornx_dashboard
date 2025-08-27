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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('client_id');
            $table->string('country');
            $table->string('platform');
            $table->string('priority');
            $table->string('technology');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('earning', 10, 2);
            $table->decimal('paid_outside', 10, 2);
            $table->string('work_done_by');
            $table->string('project_guide')->nullable();
            $table->text('reference_website')->nullable();
            $table->text('description')->nullable();
            $table->text('cpanel_details')->nullable();
            $table->text('credentials')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('In Progress');
            $table->integer('progress')->default(0);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
