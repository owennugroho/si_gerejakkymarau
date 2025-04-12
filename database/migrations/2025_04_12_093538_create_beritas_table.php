<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis'); // Kolom untuk menyimpan nama penulis
            $table->text('kutipan')->nullable(); // Kolom ringkasan atau excerpt berita
            $table->string('foto')->nullable();  // Path foto
            $table->longText('isi');  // Isi lengkap berita
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beritas');
    }
}
