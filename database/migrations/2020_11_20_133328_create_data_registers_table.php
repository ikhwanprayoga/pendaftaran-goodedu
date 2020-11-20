<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_registers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_hp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('jenis_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->unsignedBigInteger('master_institusi_id')->nullable();
            $table->unsignedBigInteger('kategori_pendaftar_id')->nullable();
            $table->timestamps();

            $table->foreign('master_institusi_id')
                ->references('id')
                ->on('master_institusis')
                ->onDelete('set null');

            $table->foreign('kategori_pendaftar_id')
                ->references('id')
                ->on('kategori_pendaftars')
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
        Schema::dropIfExists('data_registers');
    }
}
