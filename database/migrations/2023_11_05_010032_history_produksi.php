<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_produksi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hasil_produksi');
            $table->integer('tahun');
            $table->foreignId('sumberId')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_produksi');
    }
};
