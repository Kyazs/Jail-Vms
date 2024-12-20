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
        Schema::create('visitor_credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visitor_id');
            $table->string('username', 100)->unique();
            $table->string('password');
            $table->boolean('is_deleted')->default(false);

            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_credentials');
    }
};
