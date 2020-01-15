<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_peminjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl');
            $table->integer('id_anggota');
            $table->integer('id_petugas');
            $table->date('tgl_deadline');
            $table->char('denda',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_peminjaman');
    }
}
