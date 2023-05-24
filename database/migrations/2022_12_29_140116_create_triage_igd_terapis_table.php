<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriageIgdTerapisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triage_igd_terapis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('triage_igd_id');
            $table->timestamp('tgl_triage')->nullable();
            $table->string('terapi',255)->nullable();
            $table->longText('paraf')->nullable();
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
        Schema::dropIfExists('triage_igd_terapis');
    }
}
