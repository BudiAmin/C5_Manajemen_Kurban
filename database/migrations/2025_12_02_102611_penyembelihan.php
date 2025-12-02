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
        Schema::create('penyembelihan', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->unsignedBigInteger('id_hewan');
            $table->unsignedBigInteger('id_pelaksanaan');

            // Foto dokumentasi
            $table->string('dokumentasi_penyembelihan')->nullable();

            $table->timestamps();

            // Assign foreign keys dari tabel lain
            $table->foreign('id_hewan')
                ->references('ID_Hewan')->on('hewan_kurban')
                ->onDelete('cascade');

            $table->foreign('id_pelaksanaan')
                ->references('id')->on('pelaksanaans')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyembelihans');
    }
};
