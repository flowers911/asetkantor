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
        Schema::create('mutasi_asets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('aset_id')->constrained('asets')->onDelete('cascade');
        $table->foreignId('lokasi_asal_id')->constrained('lokasis')->onDelete('cascade');
        $table->foreignId('lokasi_tujuan_id')->constrained('lokasis')->onDelete('cascade');
        $table->date('tanggal_mutasi');
        $table->text('keterangan')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi_asets');
    }
};
