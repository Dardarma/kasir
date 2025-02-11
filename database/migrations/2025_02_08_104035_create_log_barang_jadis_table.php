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
        Schema::create('log_barang_jadis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang_jadi');
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('id_barang_jadi')->references('id')->on('barang_jadis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_barang_jadis');
    }
};
