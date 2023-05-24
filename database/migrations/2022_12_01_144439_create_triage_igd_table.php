<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriageIgdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triage_igd', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('noreg');
            $table->string('alergi')->nullable();
            $table->tinyInteger('status_psikologi')->nullable();
            $table->tinyInteger('kedatangan')->nullable();
            $table->string('surat_pengantar')->nullable();
            $table->string('diagnosa')->nullable();
            $table->boolean('pengantar_ambulans')->nullable();
            $table->boolean('pengantar_paramedis')->nullable();
            $table->string('triage_oleh')->nullable();
            $table->time('triage_pukul')->nullable();
            $table->tinyInteger('triage_tipe')->nullable();
            $table->tinyInteger('jalan_nafas')->nullable();
            $table->tinyInteger('gerakan_dada')->nullable();
            $table->tinyInteger('tipe_pernafasan')->nullable();
            $table->tinyInteger('denyut_nadi')->nullable();
            $table->tinyInteger('kulit')->nullable();
            $table->tinyInteger('akral')->nullable();
            $table->tinyInteger('crt')->nullable();
            $table->tinyInteger('kesadaran')->nullable();
            $table->tinyInteger('bb')->nullable();
            $table->tinyInteger('spo2')->nullable();
            $table->tinyInteger('gds')->nullable();
            $table->string('td')->nullable();
            $table->string('nadi')->nullable();
            $table->string('nafas')->nullable();
            $table->string('suhu')->nullable();
            $table->string('nyeri')->nullable();
            $table->string('lokasi')->nullable();
            $table->tinyInteger('flacc_total_skor')->nullable();
            $table->tinyInteger('klasifikasi_triage')->nullable();
            $table->tinyInteger('nyeri_wong_baker')->nullable();
            $table->boolean('pasien_jatuh_1')->nullable();
            $table->boolean('pasien_jatuh_2')->nullable();
            $table->boolean('dp_1')->nullable();
            $table->boolean('dp_2')->nullable();
            $table->boolean('dp_3')->nullable();
            $table->boolean('dp_4')->nullable();
            $table->string('anamnesa')->nullable();
            $table->string('penyakit_terdahulu')->nullable();
            $table->string('penyakit_keluarga')->nullable();
            $table->string('pengobatan')->nullable();
            $table->string('kandungan_kebidanan')->nullable();
            $table->tinyInteger('gcs_e')->nullable();
            $table->tinyInteger('gcs_v')->nullable();
            $table->tinyInteger('gcs_m')->nullable();
            $table->tinyInteger('gcs_total')->nullable();
            $table->string('kepala_wajah')->nullable();
            $table->string('leher')->nullable();
            $table->string('thorax_inspeksi')->nullable();
            $table->string('thorax_palpasi')->nullable();
            $table->string('thorax_perkusi')->nullable();
            $table->string('thorax_auskultasi')->nullable();
            $table->string('abdomen_inspeksi')->nullable();
            $table->string('abdomen_palpasi')->nullable();
            $table->string('abdomen_perkusi')->nullable();
            $table->string('abdomen_auskultasi')->nullable();
            $table->string('anogenital')->nullable();
            $table->string('ekstrtemitas')->nullable();
            $table->string('neurologis')->nullable();
            $table->string('penunjang_ekg')->nullable();
            $table->string('penunjang_laboratorium')->nullable();
            $table->string('penunjang_radiologi')->nullable();
            $table->string('penunjang_lainnya')->nullable();
            $table->string('diagnosa_kerja')->nullable();
            $table->string('diagnosa_banding')->nullable();
            $table->tinyInteger('nutrisi_bb')->nullable();
            $table->tinyInteger('nutrisi_tb')->nullable();
            $table->string('mst')->nullable();
            $table->string('asupan_makan')->nullable();
            $table->string('diagnosa_khusus')->nullable();
            $table->date('pulang_tanggal')->nullable();
            $table->time('pulang_waktu')->nullable();
            $table->string('pulang_diagnosa')->nullable();
            $table->string('pulang_icd')->nullable();
            $table->string('kondisi_td')->nullable();
            $table->string('kondisi_e')->nullable();
            $table->string('kondisi_v')->nullable();
            $table->string('kondisi_m')->nullable();
            $table->string('kondisi_hr')->nullable();
            $table->string('kondisi_rr')->nullable();
            $table->string('kondisi_suhu')->nullable();
            $table->string('kondisi_gcs')->nullable();
            $table->string('status_keluar')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('triage_igd');
    }
}
