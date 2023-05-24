<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarapanPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harapan_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('noreg');
            $table->string('pj_nama');
            $table->string('pj_tempatlahir')->nullable();
            $table->date('pj_tgllahir')->nullable();
            $table->string('pj_hp')->nullable();
            $table->text('harapan')->nullable();
            $table->text('pj_paraf');
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
        Schema::dropIfExists('harapan_pasiens');
    }
}
