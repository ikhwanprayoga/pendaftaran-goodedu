<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterInstitusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_institusis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_institusi_id')->nullable();
            $table->string('nama');
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
        Schema::dropIfExists('master_institusis');
    }
}
