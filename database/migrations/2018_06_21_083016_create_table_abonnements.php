<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbonnements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prix_reel')->nullable();
            $table->string('nom')->nullable();
            $table->date('date_effet')->nullable();
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
                    ->references('id')
                    ->on('clients');
            $table->integer('pack_id')->unsigned();
            $table->foreign('pack_id')
                    ->references('id')
                    ->on('packs');

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonnements');
    }

}
