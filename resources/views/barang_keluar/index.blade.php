@extends('layouts.app')
@section('title','Barang Keluar')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Barang Keluar</h2>
    <a href="{{ route('barang-keluar.create') }}" class="btn btn-primary">+ Tambah</a>
  </div>

  <div class="row">
    @foreach($data as $item)
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm h-100">
          @if($item->barang->gambar)
            <img src="{{ asset('storage/'.$item->barang->gambar) }}"
                 class="card-img-top" style="height:150px; object-fit:cover;">
          @endif
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $item->no_barang_keluar }}</h5>
            <p class="mb-1"><strong>Barang:</strong> {{ $item->barang->nama_barang }}</p>
            <p class="mb-1"><strong>Qty:</strong> {{ $item->quantity }}</p>
            <p class="mb-1"><strong>Tujuan:</strong> {{ $item->destination }}</p>
            <p class="text-muted">{{ $item->tanggal_keluar->format('d-m-Y') }}</p>
            <div class="mt-auto d-flex justify-content-between">
              <a href="{{ route('barang-keluar.edit', $item->id) }}"
                 class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ route('barang-keluar.destroy', $item->id) }}"
                    method="POST" onsubmit="return confirm('Hapus data ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{ $data->links() }}
</div>
@endsection
