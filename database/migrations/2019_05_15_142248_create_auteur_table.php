<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auteurConference', function (Blueprint $table) {

            $table->increments('id');
            $table->string('titre');
            $table->string('theme');
            $table->string('track');
            $table->string('note');
            $table->string('file_name');
            $table->integer('file_size');

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
        Schema::dropIfExists('auteurConference');
    }
}
