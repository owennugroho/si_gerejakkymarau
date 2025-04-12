<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTurnesTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal_turnes', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->date('tanggal');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->unsignedBigInteger('romo_id');
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            // Menambahkan foreign key untuk menghubungkan ke tabel romos
            $table->foreign('romo_id')
                  ->references('id')
                  ->on('romos')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_turnes');
    }
}
