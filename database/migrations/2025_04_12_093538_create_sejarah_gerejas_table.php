<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSejarahGerejasTable extends Migration
{
    public function up()
    {
        Schema::create('sejarah_gerejas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            // Opsi tambahan
            $table->string('slug')->unique()->nullable();
            $table->timestamps(); // create_at dan update_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('sejarah_gerejas');
    }
}
