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
        Schema::create('audit_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('action_type_id');
            $table->unsignedBigInteger('visitor_id')->nullable();
            $table->unsignedBigInteger('inmate_id')->nullable();
            $table->unsignedBigInteger('visit_id')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('action_type_id')->references('id')->on('action_types');
            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('set null');
            $table->foreign('inmate_id')->references('id')->on('inmates')->onDelete('set null');
            $table->foreign('visit_id')->references('id')->on('visits')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_log');
    }
};
