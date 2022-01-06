<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->string('id',20)->primary();
            $table->string('peminjam');
            $table->string('buku');
            $table->date('awal_peminjaman');
            $table->date('akhir_peminjaman');
            $table->enum('status', ['Belum ACC', 'Sudah ACC', 'Proses Peminjaman', 'Selesai'])->default('Belum ACC');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamans');
    }
}
