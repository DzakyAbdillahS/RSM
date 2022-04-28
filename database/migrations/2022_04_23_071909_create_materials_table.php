<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_monitoring');
            $table->unsignedBigInteger('id_detail_monitoring');
            $table->string('nama');
            $table->integer('volume')->nullable();
            $table->timestamps();

            $table->foreign('id_jenis_monitoring')->references('id')->on('jenis_monitorings')->onDelete('cascade');
            $table->foreign('id_detail_monitoring')->references('id')->on('detail_monitorings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
