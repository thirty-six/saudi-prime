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
        Schema::create('morning_register_students', function (Blueprint $table) {
            $table->id();

    // Student info
    $table->string('full_name');
    $table->string('university_number', 10);
    $table->string('phone');
    $table->string('email')->nullable();

    // Core relation (morning program only)
    $table->foreignId('program_sport_id')
        ->constrained('program_sports')
        ->cascadeOnDelete();

    // Schedule selection
    $table->enum('day_one', [
        'saturday','sunday','monday','tuesday','wednesday','thursday'
    ]);

    $table->enum('day_two', [
        'saturday','sunday','monday','tuesday','wednesday','thursday'
    ]);

    $table->time('start_time');
    $table->dateTime('start_at')->nullable();

    // Payment
    $table->enum('payment_method', [
        'online','cash','bank_transfer'
    ]);

    $table->string('payment_proof')->nullable();

    $table->unsignedInteger('price');
    $table->boolean('is_paid')->default(false);

    $table->timestamps();

    // Indexes
    $table->index('program_sport_id');
    $table->index(['day_one', 'day_two']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('morning_register_students');
    }
};
