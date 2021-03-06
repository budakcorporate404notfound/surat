<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export (1.7.0)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateTransSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_surat_keluar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_surat_masuk')->default(0)->comment('Surat Masuk');
            $table->unsignedTinyInteger('id_jenis_dokumen')->default(0)->comment('Jenis dokumen');
            $table->string('nomor_surat', 50)->default('')->comment('Nomor surat');
            $table->date('tanggal_surat')->comment('Tanggal surat');
            $table->string('kepada', 250)->default('')->comment('Kepada');
            $table->string('perihal', 250)->default('')->comment('Perihal');
            $table->unsignedTinyInteger('id_sifat_keamanan_surat')->default(0)->comment('Sifat keamanan surat');
            $table->unsignedTinyInteger('id_sifat_penyelesaian_surat')->default(0)->comment('Sifat penyelesaian surat');
            $table->date('tanggal_mulai')->comment('Tanggal mulai');
            $table->date('tanggal_selesai')->comment('Tanggal selesai');
            $table->time('mulai_pukul')->comment('Mulai pukul');
            $table->time('selesai_pukul')->comment('Selesai pukul');
            $table->timestamps();
            $table->softDeletes();
            $table->index('id_sifat_keamanan_surat', 'id_sifat_keamanan_surat');
            $table->index('id_sifat_penyelesaian_surat', 'id_sifat_penyelesaian_surat');

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
        Schema::dropIfExists('trans_surat_keluar');
    }
}
