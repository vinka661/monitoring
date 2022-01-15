<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdts', function (Blueprint $table) {
            $table->increments('fdt_id');
            $table->text('root_cause');
            $table->text('nama_fdt');
            $table->text('jangka');
            $table->date('target');
            $table->text('no_wo');
            $table->date('actual_finish');
            $table->text('rkap_rjpu');
            $table->unsignedInteger('id_rcfa');
            $table->timestamps();
            $table->foreign('id_rcfa')->references('rcfa_id')->on('rcfas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fdts');
    }
}
