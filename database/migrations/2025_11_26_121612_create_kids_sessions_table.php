<?php

use App\Models\Program;
use App\Models\Sport;
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
        Schema::create('kid_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sport::class)->constrained()->cascadeOnDelete();
            $table->string('days'); // ['saturday','sunday','monday','tuesday','wednesday','thursday']
            $table->string('status'); // ['pending', 'open', 'full', 'started', 'completed', 'cancelled'])->default('pending')
            $table->time('start_time'); // its for 2 hours
            $table->dateTime('start_at')->nullable(); // the session will start when the capcity are full or when admin confirm it
            $table->unsignedSmallInteger('capacity')->default(16);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kid_sessions');
    }
};
