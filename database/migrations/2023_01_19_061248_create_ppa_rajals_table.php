<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpaRajalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppa_rajals', function (Blueprint $table) {
            $table->id();
            $table->string('noreg');
            $table->longText('s')->nullable();
            $table->longText('o')->nullable();
            $table->longText('a')->nullable();
            $table->longText('p')->nullable();
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
        Schema::dropIfExists('ppa_rajals');
    }
}
