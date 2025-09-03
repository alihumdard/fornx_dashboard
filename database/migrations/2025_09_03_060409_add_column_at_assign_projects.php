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
        Schema::table('assign_projects', function (Blueprint $table) {
            $table->string('status')->default('Pending')->after('user_id');
            $table->integer('progress')->default('0')->after('status');
            $table->longText('description')->nullable()->after('progress');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assign_projects', function (Blueprint $table) {
            $table->dropColumn(['status', 'progress', 'description']);
        });
    }
};
