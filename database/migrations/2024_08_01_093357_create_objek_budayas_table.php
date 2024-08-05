<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjekBudayasTable extends Migration
{
    public function up()
    {
        Schema::create('objek_budayas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objek_budaya_kategori_id');
            $table->string('status');
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->foreign('objek_budaya_kategori_id')->references('id')->on('objek_budaya_kategoris')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('objek_budayas');
    }
}
