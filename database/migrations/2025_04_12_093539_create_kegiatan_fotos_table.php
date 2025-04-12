<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanFotosTable extends Migration
{
    public function up()
    {
        Schema::create('kegiatan_fotos', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();         // Judul foto, opsional
            $table->text('deskripsi')->nullable();         // Deskripsi singkat tentang foto
            $table->string('foto');                        // Path/URL file foto
            $table->timestamps();                          // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan_fotos');
    }
}
