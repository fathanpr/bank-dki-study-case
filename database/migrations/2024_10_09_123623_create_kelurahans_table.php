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
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->increments('id_kelurahan');
            $table->string('nama_kelurahan');
            $table->unsignedInteger('kecamatan_id');
            
            $table->timestamps();
            $table->foreign('kecamatan_id')->references('id_kecamatan')->on('kecamatans')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahans');
    }
};
