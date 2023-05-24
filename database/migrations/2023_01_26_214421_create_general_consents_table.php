<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralConsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_consents', function (Blueprint $table) {
            $table->id();
            $table->string('noreg');
            $table->string('nama');
            $table->date('tgllahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nohp')->nullable();
            $table->text('sign');
            $table->string('keluarga_1')->nullable();
            $table->string('keluarga_2')->nullable();
            $table->string('privasi')->nullable();
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
        Schema::dropIfExists('general_consents');
    }
}
