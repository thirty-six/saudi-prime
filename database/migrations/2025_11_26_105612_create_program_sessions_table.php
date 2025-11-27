<?php

use App\Models\Program;
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
        Schema::create('program_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Program::class)->constrained()->cascadeOnDelete();
            $table->enum('day_of_week', ['sunday','monday','tuesday','wednesday','thursday']);
            $table->time('start_time');
            $table->time('end_time');
            $table->string('group')->nullable(); // A / B etc
            $table->unsignedSmallInteger('capacity')->default(16);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_sessions');
    }
};
