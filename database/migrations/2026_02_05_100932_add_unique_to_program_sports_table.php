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
        Schema::table('program_sports', function (Blueprint $table) {
           
          // 1. Drop foreign keys (they depend on the index)
            $table->dropForeign('program_sports_program_id_foreign');
            $table->dropForeign('program_sports_sport_id_foreign');

            // 2. Drop the old unique index
            $table->dropUnique('program_sports_program_id_sport_id_unique');

            // 3. Add the correct unique constraint
            $table->unique(
                ['program_id', 'sport_id', 'day', 'start_time'],
                'program_sports_unique_session'
            );

            // 4. Re-add foreign keys
            $table->foreign('program_id')
                ->references('id')->on('programs')
                ->cascadeOnDelete();

            $table->foreign('sport_id')
                ->references('id')->on('sports')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_sports', function (Blueprint $table) {
            $table->dropForeign(['program_id']);
            $table->dropForeign(['sport_id']);

            $table->dropUnique('program_sports_unique_session');

            $table->unique(
                ['program_id', 'sport_id'],
                'program_sports_program_id_sport_id_unique'
            );

            $table->foreign('program_id')
                ->references('id')->on('programs')
                ->cascadeOnDelete();

            $table->foreign('sport_id')
                ->references('id')->on('sports')
                ->cascadeOnDelete();
        });
    }
};