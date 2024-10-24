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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('post_id'); // ID của bài đăng gốc
            $table->unsignedBigInteger('user_id'); // ID của người dùng đã đăng bình luận
            $table->unsignedBigInteger('parent_comment_id')->nullable(); // ID của bình luận cha, có thể là NULL
            $table->text('content'); // Nội dung của bình luận
            $table->timestamp('created_at')->useCurrent(); // Thời gian tạo bình luận

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
