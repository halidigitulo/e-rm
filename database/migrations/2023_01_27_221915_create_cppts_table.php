<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cppts', function (Blueprint $table) {
            $table->id();
            $table->string('noreg');
            $table->string('ppa')->nullable();
            $table->string('s')->nullable();
            $table->string('o')->nullable();
            $table->string('a')->nullable();
            $table->string('p')->nullable();
            $table->string('instruksi')->nullable();
            $table->string('dpjp')->nullable();
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
        Schema::dropIfExists('cppts');
    }
}
