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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id()->primary();
            // $table->unsignedBigInteger('tagihan_id');
            // $table->foreign('tagihan_id')->references('id')->on('tagihans')->onUpdate('cascade')->onDelete('cascade');

            // $table->foreignId('tagihan_id')->constrained();


            $table->datetime('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
