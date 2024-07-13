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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('judul');
            $table->foreignId('id_kategori')->constrained('kategoris')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->string('created_by')->nullable();
            $table->string('update_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
