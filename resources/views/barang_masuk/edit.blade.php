@extends('layouts.app')
@section('title','Edit Barang Masuk')

@section('content')
<div class="container">
  <div class="card mx-auto" style="max-width:600px;">
    <div class="card-body">
      <h4 class="mb-4">Form Edit Barang Masuk</h4>
      <form action="{{ route('barang-masuk.update', $barangMasuk->id) }}"
            method="POST">
        @csrf @method('PUT')
        {{-- No Masuk --}}
        <div class="mb-3">
          <label class="form-label">No. Masuk</label>
          <input type="text" name="no_barang_masuk"
                 class="form-control @error('no_barang_masuk') is-invalid @enderror"
                 value="{{ old('no_barang_masuk', $barangMasuk->no_barang_masuk) }}">
          @error('no_barang_masuk')
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
                {{ old('kode_barang', $barangMasuk->kode_barang)==$b->kode_barang?'selected':'' }}>
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
                 value="{{ old('quantity', $barangMasuk->quantity) }}">
          @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Origin --}}
        <div class="mb-3">
          <label class="form-label">Origin</label>
          <input type="text" name="origin"
                 class="form-control @error('origin') is-invalid @enderror"
                 value="{{ old('origin', $barangMasuk->origin) }}">
          @error('origin')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Tanggal Masuk --}}
        <div class="mb-3">
          <label class="form-label">Tanggal Masuk</label>
          <input type="date" name="tanggal_masuk"
                 class="form-control @error('tanggal_masuk') is-invalid @enderror"
                 value="{{ old('tanggal_masuk', $barangMasuk->tanggal_masuk->toDateString()) }}">
          @error('tanggal_masuk')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
