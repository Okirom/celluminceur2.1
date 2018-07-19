<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seance_id')->unsigned();
            $table->foreign('seance_id')
                    ->references('id')
                    ->on('seances');
            $table->integer('prix')->nullable();
            $table->date('annee')->nullable();
            $table->string('nom')->nullable();
            $table->integer('nombre_seance')->nullable();

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
        Schema::dropIfExists('packs');
    }
}
