<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('jadwal_id')->constrained('jadwals')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jam_absen');
            $table->string('koordinat_absen');
            $table->string('alamat_absen');
            $table->string('jenis_absen'); // masuk atau pulang
            $table->string('status_absen'); // lebih cepat, normal atau terlambat
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
        Schema::dropIfExists('absensis');
    }
}
