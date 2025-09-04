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
     public function up(): void {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // client | user | team
            $table->unsignedBigInteger('creator_id'); // auth user who starts the chat
            $table->timestamps();
        });

        Schema::create('conversation_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversation_id');
            $table->unsignedBigInteger('user_id'); // could be client, user, or team member
            $table->string('user_type'); // App\Models\User | App\Models\Client | App\Models\Team
            $table->timestamps();

            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('conversation_user');
        Schema::dropIfExists('conversations');
    }
};
