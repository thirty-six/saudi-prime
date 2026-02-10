<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\DaysEnum;
use App\Enums\SessionStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('program_sports', function (Blueprint $table) {
           // Add 'day' column with enum values from DaysEnum
            $table->enum('day', array_map(fn($day) => $day->value, DaysEnum::cases()))->nullable();

            // Add 'start_time' column (time type)
            $table->time('start_time')->nullable();

            // Add 'status' column with enum values from SessionStatusEnum
            $table->enum('status', array_map(fn($status) => $status->value, SessionStatusEnum::cases()))
                ->default(SessionStatusEnum::Pending->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_sports', function (Blueprint $table) {
            $table->dropColumn(['day', 'start_time', 'status']);
        });
    }
};
