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
        Schema::create('group_chats', function (Blueprint $table) {
            $table->id('group_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->string('group_name', 50); // Tên nhóm, không được để trống
            $table->timestamp('created_at')->useCurrent(); // Thời gian tạo nhóm
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_chats');
    }
};
