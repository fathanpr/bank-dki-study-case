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
        Schema::create('kotas', function (Blueprint $table) {
            $table->increments('id_kota');
            $table->unsignedInteger('provinsi_id');
            $table->string('nama_kota')->unique();

            $table->timestamps();
            $table->foreign('provinsi_id')->references('id_provinsi')->on('provinsis')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kotas');
    }
};
