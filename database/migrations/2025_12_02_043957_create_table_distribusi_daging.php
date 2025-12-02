<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distribusi_daging', function (Blueprint $table) {
            $table->id('ID_Distribusi');

            $table->unsignedBigInteger('ID_Hewan');
            $table->unsignedBigInteger('ID_Penerima');

            $table->date('Tanggal_Distribusi')->nullable();
            $table->string('Penerima')->nullable();
            $table->string('Dokumentasi')->nullable();
            $table->string('Status_Distribusi', 20)->nullable();

            $table->timestamps();

            $table->foreign('ID_Hewan')
                ->references('ID_Hewan')
                ->on('hewan_kurban')
                ->onDelete('cascade');

            $table->foreign('ID_Penerima')
                ->references('ID_Penerima')
                ->on('penerima_kurban')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distribusi_daging');
    }
};
