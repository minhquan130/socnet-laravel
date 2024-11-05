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
        Schema::create('group_members', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id'); // ID của nhóm chat
            $table->unsignedBigInteger('user_id'); // ID của người dùng trong nhóm
            $table->timestamps(); // Thời gian người dùng tham gia nhóm

            // Thiết lập khóa chính tổng hợp
            $table->unique(['group_id', 'user_id']); // PRIMARY KEY (group_id, user_id)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_members');
    }
};
