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
        Schema::table('ramadan_registrations', function (Blueprint $table) {
             $table->uuid('invoice_token')
                  ->unique()
                  ->nullable()
                  ->after('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ramadan_registrations', function (Blueprint $table) {
             $table->dropColumn('invoice_token');
        });
    }
};
