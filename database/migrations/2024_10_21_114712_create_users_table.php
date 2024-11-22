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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->string('username', 50); // VARCHAR(50) NOT NULL
            $table->string('email', 100)->unique(); // VARCHAR(100) UNIQUE NOT NULL
            $table->string('password_hash', 255); // VARCHAR(255) NOT NULL
            $table->longText('profile_pic_url')->nullable(); // VARCHAR(255)
            $table->string('gender', 10)->default('male'); // TEXT
            $table->dateTime('date_of_birth'); // TEXT
            $table->text('bio')->nullable(); // TEXT
            $table->enum('privacy_setting', ['public', 'friends', 'private'])->default('public'); // ENUM với giá trị mặc định
            $table->string('address')->nullable(); // Cột 'address' có thể null
            $table->string('company')->nullable(); // Cột 'company' có thể null
            $table->string('relationship')->nullable(); // Cột 'relationship' có thể null
            $table->timestamps(); // created_at và updated_at
        });

        // Thêm chỉ mục FULLTEXT cho cột 'username' sau khi bảng đã được tạo
        DB::statement('ALTER TABLE users ADD FULLTEXT fulltext_username (username)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Xóa bảng users nếu migration rollback
        Schema::dropIfExists('users');
    }
};
