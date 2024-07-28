<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adat_id')->nullable()->constrained('adats')->onDelete('cascade');
            $table->foreignId('cagar_budaya_id')->nullable()->constrained('cagarbudayas')->onDelete('cascade');
            $table->foreignId('ritus_id')->nullable()->constrained('rituses')->onDelete('cascade');
            $table->foreignId('kesenian_id')->nullable()->constrained('kesenians')->onDelete('cascade');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
