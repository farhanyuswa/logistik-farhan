@extends('layouts.app')
@section('title','Stok Barang')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Stok Barang</h2>
  </div>

  <div class="row">
    @foreach($stok as $item)
      <div class="col-md-3 mb-3">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">{{ $item->nama_barang }}</h5>
            <p class="mb-1"><strong>Kode:</strong> {{ $item->kode_barang }}</p>
            <p class="mb-1"><strong>Total Masuk:</strong> {{ $item->total_masuk ?? 0 }}</p>
            <p class="mb-1"><strong>Total Keluar:</strong> {{ $item->total_keluar ?? 0 }}</p>
            <hr>
            <p class="mb-0"><strong>Stok Sekarang:</strong> {{ $item->stok }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
