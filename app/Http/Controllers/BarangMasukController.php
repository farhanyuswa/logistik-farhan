<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data = BarangMasuk::with('barang')
            ->orderByDesc('tanggal_masuk')
            ->paginate(9);

        return view('barang_masuk.index', compact('data'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_masuk.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_barang_masuk' => 'required|unique:barang_masuks,no_barang_masuk',
            'kode_barang'     => 'required|exists:barangs,kode_barang',
            'quantity'        => 'required|integer|min:1',
            'origin'          => 'required|string|max:100',
            'tanggal_masuk'   => 'required|date',
        ]);

        BarangMasuk::create($validated);

        return redirect()
            ->route('barang-masuk.index')
            ->with('success', 'Data barang masuk berhasil disimpan.');
    }

    public function edit(BarangMasuk $barangMasuk)
    {
        $barangs = Barang::all();
        return view('barang_masuk.edit', compact('barangMasuk', 'barangs'));
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $validated = $request->validate([
            'no_barang_masuk' => 'required|unique:barang_masuks,no_barang_masuk,'.$barangMasuk->id,
            'kode_barang'     => 'required|exists:barangs,kode_barang',
            'quantity'        => 'required|integer|min:1',
            'origin'          => 'required|string|max:100',
            'tanggal_masuk'   => 'required|date',
        ]);

        $barangMasuk->update($validated);

        return redirect()
            ->route('barang-masuk.index')
            ->with('success', 'Data barang masuk berhasil diperbarui.');
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        $barangMasuk->delete();
        return back()->with('success', 'Data barang masuk berhasil dihapus.');
    }
}
