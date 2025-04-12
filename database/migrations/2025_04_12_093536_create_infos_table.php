<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('infos');
    }
}
