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
        // === Citizens ===
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('created_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });

        // === Citizen Password Reset Tokens ===
        Schema::create('citizen_password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
