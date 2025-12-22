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
        // Schema::create('payments', function (Blueprint $table) {
        //     $table->id();
            // $table->morphs('payable'); // registration / field_booking / nursery_enrollment
            // $table->unsignedInteger('amount');
            // $table->string('currency', 3)->default('SAR');
            // $table->enum('method', [
            //     'cash', 'bank_transfer', 'electronic', 'visa', 'mada', 'stc_pay'
            // ]);
            // $table->string('evidence_path')->nullable(); // screenshot or PDF
            // $table->enum('status', ['pending','paid','failed','refunded'])->default('pending');
            // $table->string('gateway_reference')->nullable();
            // $table->timestamp('paid_at')->nullable();
            // $table->string('invoice_id')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
