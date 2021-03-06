<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export (1.7.0)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateTransDisposisiPimpinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_disposisi_pimpinan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_surat_masuk')->default(0)->comment('Surat Masuk');
            $table->unsignedInteger('id_unit')->default(0)->comment('Jabatan');
            $table->text('disposisi_pimpinan')->default('')->comment('Disposisi pimpinan');
            $table->timestamps();
            $table->softDeletes();
            $table->index('id_surat_masuk', 'id_surat_masuk');
            $table->index('id_unit', 'id_unit');

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
        Schema::dropIfExists('trans_disposisi_pimpinan');
    }
}
