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
        Schema::table('pesan_undangans', function (Blueprint $table) {

            $table->string('product_id', 20)->nullable();
            //stiker
            $table->string('stikerpanjang', 20)->nullable();
            $table->string('stikerlebar', 20)->nullable();
            $table->string('stikerbahan', 20)->nullable();

            //Umum
            $table->text('keterangan')->nullable();
            $table->string('jumlahpesanan', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesan_undangans', function (Blueprint $table) {
            //
        });
    }
};
