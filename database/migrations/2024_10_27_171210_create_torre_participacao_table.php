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
        Schema::create('torre_participacao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membro_id');
            $table->unsignedBigInteger('torre_id');
            $table->timestamps();

            $table->foreign('membro_id')->references('id')->on('membros');
            $table->foreign('torre_id')->references('id')->on('guerra_torres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torre_participacao');
    }
};
