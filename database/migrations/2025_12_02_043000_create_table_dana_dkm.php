<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dana_dkm', function (Blueprint $table) {
            $table->id('ID_DKM');
            $table->string('Sumber_dana')->nullable();
            $table->decimal('Jumlah_dana', 10, 2)->nullable();
            $table->date('Tanggal_masuk')->nullable();
            $table->text('Keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dana_dkm');
    }
};
