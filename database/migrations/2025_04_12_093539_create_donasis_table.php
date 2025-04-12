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
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bank')->nullable();     // Misal "BCA", "BRI", "CIMB"
            $table->string('nomor_rekening')->nullable(); // Misal "700.169.577.400"
            $table->string('atas_nama')->nullable();      // Misal "PGPM Gereja St. Antonius Kotabaru"
            $table->string('qris_image')->nullable();     // Path file gambar QRIS, jika diperlukan
            $table->text('keterangan')->nullable();       // Info tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
