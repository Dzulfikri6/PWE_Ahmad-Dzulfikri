@extends('layouts.dashboard')

@section('/home')
{{-- Main Content --}}
<div class="main-content">
    <header>
        <h1>Selamat Datang di Dashboard Penjualan</h1>
    </header>
    <div class="cards">
        <div class="card">
            <h3>Total Produk</h3>
            <p id="total-product">{{$totalProducts}}</p>
        </div>
        <div class="card">
            <h3>Penjualan Hari Ini</h3>
            <p id="sales-today">{{$salesToday}}</p>
        </div>
        <div class="card">
            <h3>Total Pendapatan</h3>
            <p id="total-revenue">{{$totalRevenue}}</p>
        </div>
        <div class="card">
            <h3>Pengguna Terdaftar</h3>
            <p id="registered-users">{{$registeredUsers}}</p>
        </div>
    </div>
    <div class="alert alert-primary" role="alert">
        A simple primary alert-check it out!
    </div>
    {{-- Chart --}}
    <div id="chart">
        <h2>Grafik Penjualan Bulanan</h2>
        {{-- <canvas id="salesChart"></canvas> --}}
        {!!$chart->container()!!}
    </div>
</div>
    {{-- <script src="script.js"></script> --}}
    <script src="{{$chart->cdn()}}"></script>
    {{$chart->script()}}
@endsection
