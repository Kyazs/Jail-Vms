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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique();
            $table->string('contact_number', 20)->unique(); //unique
            $table->unsignedBigInteger('gender_id'); // Foreign key
            $table->date('date_of_birth')->nullable();
            $table->string('country', 20)->nullable();
            $table->string('address_street', 255);
            $table->string('address_city', 100);
            $table->string('address_province', 100);
            $table->string('address_barangay', 100);
            $table->string('address_zip', 20);
            $table->unsignedBigInteger('id_type'); // Foreign key
            $table->text('id_document_path');
            // ... (add all other columns from your schema)
            $table->timestamps(); // Created_at and updated_at timestamps
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_deleted')->default(false);
            // Define foreign key constraints:
            $table->foreign('gender_id')->references('id')->on('genders');  // Assuming you have a 'genders' table
            $table->foreign('id_type')->references('id')->on('id_types'); // Assuming you have a 'id_types' table
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
