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
        Schema::create('ramadan_sessions', function (Blueprint $table) {
        $table->id();
        $table->string('name');

        $table->enum('days', ['sat_mon_wed', 'sun_tue_thu']);

        $table->time('start_time');
        $table->time('end_time');

        $table->integer('capacity')->default(80);
        $table->boolean('is_active')->default(true);

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ramadan_sessions');
    }
};
