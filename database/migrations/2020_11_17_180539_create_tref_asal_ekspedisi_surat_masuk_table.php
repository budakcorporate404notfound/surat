<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export (1.7.0)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateTrefAsalEkspedisiSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tref_asal_ekspedisi_surat_masuk', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('asal_ekspedisi_surat_masuk', 250)->default('')->comment('Asal ekspedisi surat masuk');
            $table->timestamps();
            $table->softDeletes();

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tref_asal_ekspedisi_surat_masuk');
    }
}