@extends('layouts.app')
@section('title','Edit Barang Keluar')

@section('content')
<div class="container">
  <div class="card mx-auto" style="max-width:600px;">
    <div class="card-body">
      <h4 class="mb-4">Form Edit Barang Keluar</h4>
      <form action="{{ route('barang-keluar.update', $barangKeluar->id) }}"
            method="POST">
        @csrf @method('PUT')
        {{-- No Keluar --}}
        <div class="mb-3">
          <label class="form-label">No. Keluar</label>
          <input type="text" name="no_barang_keluar"
                 class="form-control @error('no_barang_keluar') is-invalid @enderror"
                 value="{{ old('no_barang_keluar', $barangKeluar->no_barang_keluar) }}">
          @error('no_barang_keluar')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Barang --}}
        <div class="mb-3">
          <label class="form-label">Barang</label>
          <select name="kode_barang"
                  class="form-select @error('kode_barang') is-invalid @enderror">
            <option value="">-- Pilih Barang --</option>
            @foreach($barangs as $b)
              <option value="{{ $b->kode_barang }}"
                {{ old('kode_barang', $barangKeluar->kode_barang)==$b->kode_barang?'selected':'' }}>
                {{ $b->kode_barang }} – {{ $b->nama_barang }}
              </option>
            @endforeach
          </select>
          @error('kode_barang')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Quantity --}}
        <div class="mb-3">
          <label class="form-label">Quantity</label>
          <input type="number" name="quantity"
                 class="form-control @error('quantity') is-invalid @enderror"
                 value="{{ old('quantity', $barangKeluar->quantity) }}">
          @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Destination --}}
        <div class="mb-3">
          <label class="form-label">Destination</label>
          <input type="text" name="destination"
                 class="form-control @error('destination') is-invalid @enderror"
                 value="{{ old('destination', $barangKeluar->destination) }}">
          @error('destination')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Tanggal Keluar --}}
        <div class="mb-3">
          <label class="form-label">Tanggal Keluar</label>
          <input type="date" name="tanggal_keluar"
                 class="form-control @error('tanggal_keluar') is-invalid @enderror"
                 value="{{ old('tanggal_keluar', $barangKeluar->tanggal_keluar->toDateString()) }}">
          @error('tanggal_keluar')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
