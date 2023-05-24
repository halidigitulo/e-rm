<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersetujuanRanapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persetujuan_ranaps', function (Blueprint $table) {
            $table->id();
            $table->string('noreg');
            $table->string('pj_nama');
            $table->string('pj_hp')->nullable();
            $table->string('pj_alamat')->nullable();
            $table->string('pj_ktp')->nullable();
            $table->string('pj_agama')->nullable();
            $table->string('pj_pendidikan')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('pernah_rawat')->nullable();
            $table->string('penanggung_biaya')->nullable();
            $table->string('kelas_rawat')->nullable();
            $table->string('nama_keluarga')->nullable();
            $table->string('alamat_keluarga')->nullable();
            $table->text('pj_paraf')->nullable();
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('persetujuan_ranaps');
    }
}
