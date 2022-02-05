<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->increments('progres_id');
            $table->integer('id_fdt')->unsigned();
            $table->integer('id_pic')->unsigned();
            $table->date('tanggal_progres');
            $table->text('nama_progres');
            $table->text('ket_progres');
            $table->date('tanggal_target');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('id_fdt')->references('fdt_id')->on('fdts')->onDelete('cascade');
            $table->foreign('id_pic')->references('pic_id')->on('pics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
}
