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
        Schema::create(\Venture\Letter\Enums\MigrationsEnum::TANDA_TERIMAS->table(), function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->string('received_from');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(\Venture\Letter\Enums\MigrationsEnum::TANDA_TERIMAS->table());
    }
};
