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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            // $table->foreignId('laporan_id')->constrained();
            $table->integer('nominal');
            $table->string('catatan')->nullable();
            $table->enum('bulan', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
            $table->enum('status', ['sudah terbayar', 'belum terbayar'])->default('belum terbayar');
            $table->string('bukti');
            $table->timestamps();
            // $table->string('bulan')->default(now()->format('F')); //buat default mengikuti bulan

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
