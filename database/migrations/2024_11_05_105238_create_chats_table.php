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
        Schema::create('chats', function (Blueprint $table) {
            $table->id(); // Tạo cột khóa chính tự tăng
            $table->foreignId('sender_id'); // Khóa ngoại đến bảng users
            $table->foreignId('receiver_id'); // Khóa ngoại đến bảng users
            $table->text('message'); // Nội dung tin nhắn
            $table->timestamp('sent_at')->useCurrent(); // Thời gian gửi tin nhắn
            $table->timestamps(); // Tạo các cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
