<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $data = BarangKeluar::with('barang')
            ->orderByDesc('tanggal_keluar')
            ->paginate(9);

        return view('barang_keluar.index', compact('data'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_keluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_barang_keluar' => 'required|unique:barang_keluars,no_barang_keluar',
            'kode_barang'      => 'required|exists:barangs,kode_barang',
            'quantity'         => 'required|integer|min:1',
            'destination'      => 'required|string|max:100',
            'tanggal_keluar'   => 'required|date',
        ]);

        BarangKeluar::create($validated);

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Data barang keluar berhasil disimpan.');
    }

    public function edit(BarangKeluar $barangKeluar)
    {
        $barangs = Barang::all();
        return view('barang_keluar.edit', compact('barangKeluar', 'barangs'));
    }

    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $validated = $request->validate([
            'no_barang_keluar' => 'required|unique:barang_keluars,no_barang_keluar,'.$barangKeluar->id,
            'kode_barang'      => 'required|exists:barangs,kode_barang',
            'quantity'         => 'required|integer|min:1',
            'destination'      => 'required|string|max:100',
            'tanggal_keluar'   => 'required|date',
        ]);

        $barangKeluar->update($validated);

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Data barang keluar berhasil diperbarui.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();
        return back()->with('success', 'Data barang keluar berhasil dihapus.');
    }
}
