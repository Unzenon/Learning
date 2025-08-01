<?php

use Illuminate\Support\Facades\Schema;
use Venture\Letter\Enums\MigrationsEnum;
use Venture\Home\Enums\MigrationsEnum as HomeMigrationsEnum;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(MigrationsEnum::LETTER_RECEIPT_NOTES->table(), function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('day');
            $table->string('from');
            $table->string('to');
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->constrained(HomeMigrationsEnum::USERS->table())->nullable();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(MigrationsEnum::LETTER_RECEIPT_NOTES->table());
    }
};
