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
        Schema::create('line_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('line_id')->constrained('lines')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('languages');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('line_translations');
    }
};
