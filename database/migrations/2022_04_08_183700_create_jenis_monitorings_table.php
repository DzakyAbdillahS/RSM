<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_monitorings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pekerjaan');
            $table->string('nama');
            $table->timestamps();
            // $table->softDeletes();

            $table->foreign('id_pekerjaan')->references('id')->on('pekerjaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_monitorings');
    }
}
