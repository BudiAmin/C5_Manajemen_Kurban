<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_penyembelih', function (Blueprint $table) {
            $table->id('ID_Jadwal');
            $table->string('Foto_Dokumentasi')->nullable();
            $table->string('Nama_Penyembelih');
            $table->dateTime('Waktu_Penyembelih')->nullable();
            $table->string('Lokasi_Penyembelih')->nullable();

            $table->unsignedBigInteger('ID_Operasional')->nullable();

            $table->timestamps();

            $table->foreign('ID_Operasional')
                ->references('ID_Operasional')
                ->on('dana_operasional')
                ->onDelete('set null'); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_penyembelih');
    }
};
