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
        Schema::create('log_barang_gudangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang_gudang');
            $table->integer('jumlah');
            $table->integer('keterangan');
            $table->timestamps();

            $table->foreign('id_barang_gudang')->references('id')->on('barang_gudangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_barang_gudangs');
    }
};
