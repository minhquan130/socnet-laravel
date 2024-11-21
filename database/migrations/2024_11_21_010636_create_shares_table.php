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
            $table->id(); // ID tự tăng
            $table->unsignedBigInteger('user_id'); // Người chia sẻ
            $table->unsignedBigInteger('post_id'); // Bài viết được chia sẻ
            $table->unsignedBigInteger('friend_id'); // Bạn bè nhận bài viết
            $table->timestamps(); // created_at, updated_at
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
