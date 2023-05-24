<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiologisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radiologis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('noreg');
            $table->text('isi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('kodepmr')->nullable();
            $table->string('kodedokter_kirim')->nullable();
            $table->string('kodedokter_periksa')->nullable();
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
        Schema::dropIfExists('radiologis');
    }
}
