<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRcfasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rcfas', function (Blueprint $table) {
            $table->increments('rcfa_id');
            $table->text('keterangan');
            $table->date('tanggal');
            $table->text('input');
            $table->text('failure_mode');
            $table->text('evaluasi_rekom');
            $table->boolean('berulang_1_bln');
            $table->boolean('berulang_3_bln');
            $table->boolean('berulang_6_bln');
            $table->boolean('berulang_1_th');
            $table->boolean('berulang_3_th');
            $table->string('id_asset');
            $table->timestamps();
            $table->foreign('id_asset')->references('asset_id')->on('assets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rcfas');
    }
}
