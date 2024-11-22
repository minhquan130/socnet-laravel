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
        Schema::create('shares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Người chia sẻ
            $table->unsignedBigInteger('post_id'); // Bài viết được chia sẻ
            $table->unsignedBigInteger('friend_id')->nullable(); // Người nhận chia sẻ (nếu có)
            $table->enum('visibility', ['public', 'friends', 'private'])->default('public'); // Chế độ chia sẻ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shares');
    }
};
