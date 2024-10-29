@extends('layouts.dashboard')

@section('/editProduk')
<div class="main-content">
    <form action="{{url('/produk/edit/'.$ubahproduk->kode_produk)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required value='{{$ubahproduk->nama_produk}}'>
        </div>
        <div class="form-group">
            <label for="nama_produk">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required value='{{$ubahproduk->deskripsi}}'>
        </div>
        <div class="form-group">
            <label for="nama_produk">Harga</label>
            <input type="text" name="harga" class="form-control" required value='{{$ubahproduk->harga}}'>
        </div>
        <div class="form-group">
            <label for="nama_produk">Jumlah Produk</label>
            <input type="text" name="jumlah_produk" class="form-control" required value='{{$ubahproduk->jumlah_produk}}'>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit"class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
