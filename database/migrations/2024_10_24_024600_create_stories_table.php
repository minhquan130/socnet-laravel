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
        Schema::create('stories', function (Blueprint $table) {
            $table->id('story_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // ID của người dùng đăng story
            $table->text('content')->nullable(); // Nội dung của story, có thể để trống
            $table->string('media_url', 255)->nullable(); // Đường dẫn tới media (hình ảnh, video), có thể để trống
            $table->timestamp('expires_at'); // Thời gian hết hạn của story
            $table->timestamp('created_at')->useCurrent(); // Thời gian tạo story, mặc định là CURRENT_TIMESTAMP

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
