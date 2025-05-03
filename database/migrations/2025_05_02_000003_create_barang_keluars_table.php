<?php 
// database/migrations/2025_05_02_000003_create_barang_keluars_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('barang_keluars', function(Blueprint $t){
            $t->id();
            $t->string('no_barang_keluar')->unique();
            $t->string('kode_barang');
            $t->integer('quantity');
            $t->string('destination');
            $t->date('tanggal_keluar');
            $t->timestamps();
            $t->foreign('kode_barang')->references('kode_barang')->on('barangs')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('barang_keluars');
    }
};
