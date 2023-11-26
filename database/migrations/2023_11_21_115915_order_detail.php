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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jenis_id');
            $table->integer('order_id');
            $table->integer('jumlah');
            $table->integer('jumlah_harga');
            $table->string('nama_pemilik');
            $table->string('merk');
            $table->string('nopol');
            $table->string('foto_kendaraan')->nullable();
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
        Schema::dropIfExists('orderDetail');
    }
};
