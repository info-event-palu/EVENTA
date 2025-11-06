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
        Schema::create('acara', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->date('Tanggal');
            $table->time('Waktu');
            $table->string('Lokasi');
            $table->string('Deskripsi');
            $table->string('Kategori');
            $table->timestamps();
            $table->foreignId('id_admin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("acara");
    }
};
