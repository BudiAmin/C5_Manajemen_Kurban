<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penerima_kurban', function (Blueprint $table) {
            $table->id('ID_Penerima');
            $table->string('Nama');
            $table->string('Tempat_Tinggal')->nullable();
            $table->date('Tanggal_Terima')->nullable();
            $table->unsignedBigInteger('ID_User')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penerima_kurban');
    }
};
