<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tạo bảng 'posts' với các cột cần thiết
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // INT không dấu cho user_id
            $table->text('content')->nullable(); // TEXT cho nội dung bài viết, có thể null
            $table->unsignedBigInteger('shared_post_id')->nullable(); // Bài viết được chia sẻ
            $table->longText('media_url')->nullable(); // VARCHAR(255) cho đường dẫn media, có thể null
            $table->timestamps(); // Thêm cả created_at và updated_at
        });

        // Thêm chỉ mục FULLTEXT cho cột 'content' sau khi bảng đã được tạo
        DB::statement('ALTER TABLE posts ADD FULLTEXT fulltext_content (content)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Xóa bảng 'posts' khi rollback migration
        Schema::dropIfExists('posts');
    }
};
