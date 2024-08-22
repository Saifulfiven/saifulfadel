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
        if (!Schema::hasTable('penggunas')) {
            Schema::create('penggunas', function (Blueprint $table) {
                $table->id();
                $table->string('username', 50);
                $table->string('password', 100);
                $table->string('namalengkap', 100);
                $table->string('no_hp', 15)->nullable();
                $table->string('jeniskelamin', 10)->nullable();
                $table->string('tahunlahir', 10)->nullable();
                $table->string('alamat', 100)->nullable();
                $table->string('remember_token', 100)->nullable();
                $table->string('statuslogin', 30)->nullable();
                $table->string('cobalogin', 30)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penggunas_tables');
    }
};
