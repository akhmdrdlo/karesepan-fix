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
        Schema::create('resep_makanan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->foreign();
            $table->string('nama_makanan');
            $table->string('deskripsi');
            $table->integer('resep');
            $table->integer('cara_buat');
            $table->string('link_gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_makanan');
    }
};
