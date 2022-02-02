<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('upload_id');
            $table->text('keterangan_kajian');
            $table->string('upload_kajian');
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
        Schema::dropIfExists('uploads');
    }
}
