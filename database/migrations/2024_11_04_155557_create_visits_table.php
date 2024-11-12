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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id');
            $table->unsignedBigInteger('inmate_id');
            $table->timestamp('check_in_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('check_out_time')->nullable();
            $table->unsignedBigInteger('status_id')->default(1); // Changed to unsignedBigInteger
            $table->unsignedInteger('visit_duration')->nullable();

            $table->foreign('visitor_id')->references('id')->on('visitors');
            $table->foreign('inmate_id')->references('id')->on('inmates');
            $table->foreign('status_id')->references('id')->on('visit_status'); // Ensure correct table name
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
