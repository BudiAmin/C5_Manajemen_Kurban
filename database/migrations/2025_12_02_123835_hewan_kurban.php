<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hewan_kurban', function (Blueprint $table) {
            $table->id('ID_Hewan'); // satu-satunya auto increment
            $table->unsignedBigInteger('ID_Detail');
            $table->unsignedBigInteger('ID_User')->nullable();

            $table->string('Titip_bayar', 50)->nullable();
            $table->integer('Total_Hewan')->nullable();
            $table->integer('Total_Harga')->nullable();

            $table->timestamps();

            // foreign keys
            $table->foreign('ID_Detail')->references('id')->on('details')->onDelete('cascade');
            $table->foreign('ID_User')->references('ID_User')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hewan_kurban');
    }
};
