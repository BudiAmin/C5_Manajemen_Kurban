<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hewan_kurban', function (Blueprint $table) {
            $table->id('ID_Hewan');
            $table->unsignedBigInteger('ID_Jadwal');

            $table->string('Jenis_Hewan', 50)->nullable();
            $table->string('Status_Hewan', 20)->nullable();
            $table->unsignedBigInteger('ID_User')->nullable();

            $table->timestamps();

            $table->foreign('ID_Jadwal')
                ->references('ID_Jadwal')
                ->on('jadwal_penyembelih')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hewan_kurban');
    }
};
