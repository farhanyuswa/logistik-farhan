<?php

// database/migrations/2025_05_02_000001_create_barangs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('barangs', function(Blueprint $t){
            $t->id();
            $t->string('kode_barang')->unique();
            $t->string('nama_barang');
            $t->string('gambar')->nullable();
            $t->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('barangs');
    }
};
