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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ketersediaan');
            $table->integer('Bobot');
            $table->integer('Harga');
            $table->integer('Jumlah');
            $table->timestamps();

            
            // Assign foreign keys dari tabel lain
            $table->foreign('id_ketersediaan')
                ->references('id')->on('ketersediaans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
