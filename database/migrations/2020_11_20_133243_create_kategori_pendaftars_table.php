<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriPendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('kategori_institusi_id')->nullable();
            $table->timestamps();

            $table->foreign('kategori_institusi_id')
                ->references('id')
                ->on('kategori_institusis')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_pendaftars');
    }
}
