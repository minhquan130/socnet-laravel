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
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email', 254)->index(); // Cột email
            $table->string('token');          // Cột token
            $table->timestamp('created_at')->nullable(); // Cột created_atp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_resets');
    }
};