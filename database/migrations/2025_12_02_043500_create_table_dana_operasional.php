<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dana_operasional', function (Blueprint $table) {
            $table->id('ID_Operasional');
            $table->string('Keperluan')->nullable();
            $table->decimal('Jumlah_Pengeluaran', 10, 2)->nullable();
            $table->date('Tanggal_Pengeluaran')->nullable();
            $table->text('Keterangan')->nullable();

            $table->unsignedBigInteger('ID_DKM')->nullable();
            $table->unsignedBigInteger('ID_User')->nullable();

            $table->timestamps();

            $table->foreign('ID_DKM')
                ->references('ID_DKM')
                ->on('dana_dkm')
                ->onDelete('set null');
            
            // PENAMBAHAN: Foreign Key ke tabel users
            $table->foreign('ID_User')
                ->references('ID_User')
                ->on('users')
                ->onDelete('set null'); // ID_User nullable, jadi 'set null' adalah pilihan yang aman.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dana_operasional');
    }
};