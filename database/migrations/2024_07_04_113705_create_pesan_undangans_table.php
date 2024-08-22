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
        Schema::create('pesan_undangans', function (Blueprint $table) {
            $table->id();
            $table->string('kodeorder', 50);
            $table->string('kodedesain', 50);
            $table->text('detailcustomer');
            $table->text('catatantambahan');
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
        Schema::dropIfExists('pesan_undangans');
    }
};
