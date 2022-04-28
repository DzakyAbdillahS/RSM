<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_monitorings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_monitoring');
            $table->string('uraian_pekerjaan');
            $table->string('satuan');
            $table->integer('volume');
            $table->timestamps();
            // $table->softDeletes();

            $table->foreign('id_jenis_monitoring')->references('id')->on('jenis_monitorings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_monitorings');
    }
}
