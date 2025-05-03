<?php

namespace App\Http\Controllers;
use App\Models\Barang;

class StokController extends Controller
{
    public function index() {
        $stok = Barang::select('kode_barang','nama_barang','gambar')
            ->withSum('barangMasuk as total_masuk','quantity')
            ->withSum('barangKeluar as total_keluar','quantity')
            ->get()
            ->map(fn($i) => $i->setAttribute(
                'stok',($i->total_masuk??0)-($i->total_keluar??0))
            );
        return view('stok.index',compact('stok'));
    }
}
