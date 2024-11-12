@extends('layouts.dashboard')
@section('/produk')
{{-- Main Content --}}
<div class="main-content">
        <div class="title">
            <h1 class="h1">Daftar Produk</h1>
            <p>Temukan produk terbaik untuk kebutuhan</p>
        </div>
        <div>
            <button class="card-button"><a class="text-decoration-none text-white" href="{{url(Auth::user()->role.'/produk/add')}}">Add Product</a></button>
        </div>
        {{-- Product card 2 --}}
        <div class="product-grid">
            @foreach ($produk as $item)
        <div class="product-card">
            <img src="{{url('storage/public/image/'.$item->image)}}" alt="Produk 1">
            <h3>{{$item->nama_produk}}</h3>
            <p class="price">{{$item->harga}}</p>
            <p class="description">{{$item->deskripsi}}</p>
            <form action="{{url(Auth::user()->role.'/produk/edit/'.$item->kode_produk)}}">
                <button type="submit" class="card-button">Edit</button>
            </form>
            <form action="{{url(Auth::user()->role.'produk/delete/'.$item->kode_produk)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="card-button">Delete</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
{{-- <script src="script.js"></script> --}}
@endsection
