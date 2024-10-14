@extends('layouts.dashboard')

@section('/editProduk')
<div class="content-main">
    <form action="{{url('/produk/edit/'.$ubahproduk->kode_produk)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required value='{{$ubahproduk->nama_produk}}'>
        </div>
        <div class="form-group">
            <label for="nama_produk">Deskripsi</label>
            <input type="text" name="nama_produk" class="form-control" required value='{{$ubahproduk->deskripsi}}'>
        </div>
        <div class="form-group">
            <label for="nama_produk">Harga</label>
            <input type="text" name="nama_produk" class="form-control" required value='{{$ubahproduk->harga}}'>
        </div>
        <div class="form-group">
            <label for="nama_produk">Jumlah Produk</label>
            <input type="text" name="nama_produk" class="form-control" required value='{{$ubahproduk->jumlah_produk}}'>
        </div>
        <button type="submit"class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
