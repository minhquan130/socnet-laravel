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
        Schema::create('friends', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('friend_id'); 
            $table->enum('status', ['pending', 'accepted', 'blocked'])->default('pending'); 
            $table->timestamps();

            // $table->primary(['user_id', 'friend_id']);
            $table->unique(['user_id', 'friend_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friends');
    }
};
