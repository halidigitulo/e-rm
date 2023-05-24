<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('noreg');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->string('ruangan')->nullable();
            $table->string('penanggung_biaya')->nullable();
            $table->string('diagnosa_masuk')->nullable();
            $table->string('riwayat')->nullable();
            $table->string('pemeriksaan_fisik')->nullable();
            $table->string('pemeriksaan_penunjang')->nullable();
            $table->string('terapi')->nullable();
            $table->string('hasil_konsultasi')->nullable();
            $table->string('kode_diagnosa_utama')->nullable();
            $table->string('alergi')->nullable();
            $table->string('laboratorium')->nullable();
            $table->string('diet')->nullable();
            $table->string('instruksi')->nullable();
            $table->tinyInteger('kondisi_keluar')->nullable();
            $table->tinyInteger('cara_keluar')->nullable();
            $table->tinyInteger('pengobatan_lanjutan')->nullable();
            $table->date('tgl_kontrol')->nullable();
            $table->tinyInteger('user_id');
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
        Schema::dropIfExists('resumes');
    }
}
