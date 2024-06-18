<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanBakusTable extends Migration
{
    public function up()
    {
        Schema::create('bahan_bakus', function (Blueprint $table) {
            $table->id();
            $table->string('komponen_biaya_id');
            $table->string('subkomponen_biaya_id');
            $table->string('jenis');
            $table->string('kebutuhan_per_produksi');
            $table->string('satuan');
            $table->string('biaya_persatuan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bahan_bakus');
    }
}
