@extends('layouts.dashboard')

@section('/produk')
<div class="main-content">
        <div>
            <form action="{{url(Auth::user()->role.'/produk/add/')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_produk">Jumlah Produk</label>
                    <input type="text" name="jumlah_produk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
</div>
@endsection
