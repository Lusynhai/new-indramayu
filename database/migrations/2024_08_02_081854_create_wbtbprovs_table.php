<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWbtbprovsTable extends Migration
{
    public function up()
    {
        Schema::create('wbtbprovs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->text('document');
            $table->unsignedTinyInteger('kategori_id'); // Kolom untuk menyimpan ID kategori sebagai angka kecil
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wbtbprovs');
    }
}
