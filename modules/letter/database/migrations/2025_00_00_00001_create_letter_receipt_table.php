<?php

use Illuminate\Support\Facades\Schema;
use Venture\Letter\Enums\MigrationsEnum;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(MigrationsEnum::LETTER_RECEIPTS->table(), function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('received_from');
            $table->decimal('amount', 15, 2);
            $table->text('payment_for');
            $table->foreignId('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(MigrationsEnum::LETTER_RECEIPTS->table());
    }
};
