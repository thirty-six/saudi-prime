<?php

use App\Models\AdultSession;
use App\Models\Registration;
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
        Schema::create('adult_session_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AdultSession::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Registration::class)->constrained()->cascadeOnDelete();
            $table->json('attendance_date')->nullable(); // [date1, date2, ...] the dates the customer attended
            $table->timestamps();
            $table->unique(['registration_id', 'adult_session_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adult_session_registrations');
    }
};
