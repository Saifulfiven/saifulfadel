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
        Schema::create('orderpemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kodeorder', 20)->nullable();
            $table->string('stikerpanjang', 20)->nullable();
            $table->string('stikerlebar', 20)->nullable();
            $table->string('stikerbahan', 20)->nullable();
            //Undangan
            $table->string('kodedesain', 20)->nullable();
            
            //Umum
            $table->text('keterangan')->nullable();
            $table->string('jumlahpesanan', 10)->nullable();
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
        Schema::dropIfExists('orderpemesanan');
    }
};
