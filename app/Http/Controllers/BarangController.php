<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index() {
        $barangs = Barang::paginate(12);
        return view('barang.index', compact('barangs'));
    }

    public function create() {
        return view('barang.create');
    }

    public function store(Request $r) {
        $v = $r->validate([
            'kode_barang'=>'required|unique:barangs,kode_barang',
            'nama_barang'=>'required|string|max:100',
            'gambar'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);
        if ($r->hasFile('gambar')) {
            $v['gambar'] = $r->file('gambar')->store('barang','public');
        }
        Barang::create($v);
        return redirect()->route('barang.index')->with('success','Barang ditambahkan');
    }

    public function edit(Barang $barang) {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $r, Barang $barang) {
        $v = $r->validate([
            'kode_barang'=>"required|unique:barangs,kode_barang,{$barang->id}",
            'nama_barang'=>'required|string|max:100',
            'gambar'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);
        if ($r->hasFile('gambar')) {
            Storage::disk('public')->delete($barang->gambar);
            $v['gambar'] = $r->file('gambar')->store('barang','public');
        }
        $barang->update($v);
        return redirect()->route('barang.index')->with('success','Barang diperbarui');
    }

    public function destroy(Barang $barang) {
        Storage::disk('public')->delete($barang->gambar);
        $barang->delete();
        return back()->with('success','Barang dihapus');
    }
}
