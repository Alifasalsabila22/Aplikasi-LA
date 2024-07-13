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
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_keluar')->nullable();
            $table->string('no_transaksi');
            $table->foreignId('id_barang')->constrained('barangs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_gudang')->constrained('gudangs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_rak')->constrained('raks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('jumlah_keluar');
            $table->string('total_stock');
            $table->enum('status', ['in', 'out']);
            $table->softDeletes();
            $table->timestamps();;;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
