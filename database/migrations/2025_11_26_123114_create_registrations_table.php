<?php

use App\Models\Customer;
use App\Models\Kid;
use App\Models\ProgramSession;
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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->constrained()->nullOnDelete();
            $table->foreignIdFor(Kid::class)->nullable()->constrained()->nullOnDelete();//if its not null then the program is evening_kids
            $table->foreignIdFor(ProgramSession::class)->constrained()->cascadeOnDelete();

            $table->enum('subscription_type', ['monthly','per_day'])->nullable();

            $table->unsignedInteger('price')->nullable();
            $table->enum('status', ['pending','approved','rejected','paid','cancelled'])
                ->default('pending');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
