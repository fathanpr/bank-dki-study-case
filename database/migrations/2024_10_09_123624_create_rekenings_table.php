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
        Schema::create('rekenings', function (Blueprint $table) {
            $table->increments('id_rekening');
            $table->unsignedInteger('pekerjaan_id');
            $table->string('nama')->unique()->regex('/^[a-zA-Z]+$/');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->unsignedInteger('provinsi_id');
            $table->unsignedInteger('kota_id');
            $table->unsignedInteger('kecamatan_id');
            $table->unsignedInteger('kelurahan_id');
            $table->string('nama_jalan');
            $table->string('rt');
            $table->string('rw');
            $table->integer('nominal_setor');
            $table->enum('status_approval', ['Menunggu Approval', 'Disetujui'])->default('Menunggu Approval');


            $table->foreign('pekerjaan_id')->references('id_pekerjaan')->on('pekerjaans')->restrictOnDelete();
            $table->foreign('provinsi_id')->references('id_provinsi')->on('provinsis')->restrictOnDelete(); 
            $table->foreign('kota_id')->references('id_kota')->on('kotas')->restrictOnDelete();
            $table->foreign('kecamatan_id')->references('id_kecamatan')->on('kecamatans')->restrictOnDelete();
            $table->foreign('kelurahan_id')->references('id_kelurahan')->on('kelurahans')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekenings');
    }
};
