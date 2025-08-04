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
        Schema::create(MigrationsEnum::LETTER_RECEIPT_NOTE_ENTRIES->table(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('letter_receipt_note_id')->constrained(MigrationsEnum::LETTER_RECEIPT_NOTES->table())()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('invoice_date');
            $table->string('invoice_number');
            $table->decimal('amount', 15, 2);
            $table->string('description');
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(MigrationsEnum::LETTER_RECEIPT_NOTE_ENTRIES->table());
    }
};
