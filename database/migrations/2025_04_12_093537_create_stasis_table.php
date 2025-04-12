<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStasisTable extends Migration
{
    public function up()
    {
        Schema::create('stasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_stasi');
            $table->string('desa')->nullable();
            $table->text('alamat')->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('umat_laki')->default(0);
            $table->unsignedInteger('umat_perempuan')->default(0);
            $table->string('foto_gereja')->nullable();
            $table->string('foto_tanah')->nullable();
            $table->timestamps(); // ini menggantikan tanggal_input dengan created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('stasis');
    }
}
