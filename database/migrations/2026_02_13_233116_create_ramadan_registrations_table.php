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
        Schema::create('ramadan_registrations', function (Blueprint $table) {
    $table->id();
            // Guardian
    $table->string('guardian_name');
    $table->string('guardian_phone');
    $table->string('guardian_email')->nullable();

    // Child
    $table->string('child_name');
    $table->date('child_dob');

    $table->enum('age_group', ['boys', 'girls']);

    // Session
    $table->foreignId('ramadan_session_id')
        ->constrained()
        ->cascadeOnDelete();

    // Payment
    $table->enum('payment_method', ['cash'])->default('cash');

    $table->boolean('accepted_terms')->default(false);
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ramadan_registrations');
    }
};
