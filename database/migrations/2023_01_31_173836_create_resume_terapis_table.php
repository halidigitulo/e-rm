<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeTerapisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_terapis', function (Blueprint $table) {
            $table->id();
            $table->string('noreg');
            $table->string('nama_obat');
            $table->unsignedInteger('jumlah')->nullable();
            $table->string('dosis')->nullable();
            $table->string('frekuensi')->nullable();
            $table->string('cara_pemberian')->nullable();
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
        Schema::dropIfExists('resume_terapis');
    }
}
