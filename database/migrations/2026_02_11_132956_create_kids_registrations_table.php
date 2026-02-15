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
        Schema::create('kids_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sport_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kid_session_id')->constrained()->cascadeOnDelete();
            $table->string('guardian_name');
            $table->string('guardian_phone');
            $table->string('guardian_email')->nullable();
            $table->string('child_name');
            $table->date('child_dob');
            $table->string('age_group');
            $table->string('subscription_type');
            $table->string('payment_method');
            $table->string('payment_proof')->nullable();
            $table->string('guardian_approval')->nullable();
            $table->time('start_time')->nullable();
            $table->datetime('start_at')->nullable();
            $table->boolean('accepted_terms')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kids_registrations');
    }
};
