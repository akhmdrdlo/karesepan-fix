<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriIdToResepMakananTable extends Migration
{
    /**
     * Tambahkan kolom kat_id ke tabel resep_makanan.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resep_makanan', function (Blueprint $table) {
            $table->unsignedBigInteger('kat_id')->nullable()->after('nama_makanan'); // Menambahkan kat_id, nullable agar bisa kosong

            // Menambahkan foreign key constraint jika ada tabel kategori
            $table->foreign('kat_id')->references('id')->on('kategori')->onDelete('set null');
        });
    }

    /**
     * Membatalkan perubahan di method up().
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resep_makanan', function (Blueprint $table) {
            $table->dropForeign(['kat_id']); // Menghapus foreign key constraint
            $table->dropColumn('kat_id'); // Menghapus kolom kategori_id
        });
    }
}