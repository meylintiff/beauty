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
        Schema::create('perbandingan', function (Blueprint $table) {
            $table->id();
            $table->string('kriteria');
            $table->decimal('C1', 10, 2)->nullable();
            $table->decimal('C2', 10, 2)->nullable();
            $table->decimal('C3', 10, 2)->nullable();
            $table->decimal('C4', 10, 2)->nullable();
            $table->decimal('C5', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbandingan');
    }
};
