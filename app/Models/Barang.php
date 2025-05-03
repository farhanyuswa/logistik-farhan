<?php
// app/Models/Barang.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Tabel yang digunakan (opsional, Laravel akan 
    // otomatis menebak 'barangs' dari nama model 'Barang')
    protected $table = 'barangs';

    // Mass assignment
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'gambar',
    ];

    /**
     * Relasi ke barang_masuks
     */
    public function barangMasuk()
    {
        // foreign key di barang_masuks = kode_barang
        // local key di barangs = kode_barang
        return $this->hasMany(BarangMasuk::class, 'kode_barang', 'kode_barang');
    }

    /**
     * Relasi ke barang_keluars
     */
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'kode_barang', 'kode_barang');
    }
}
