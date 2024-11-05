{{-- Sidebar --}}
<div class="sidebar">
    <h2>Dashboard Penjual</h2>
    <ul>
        <li><a href="{{url(Auth::user()->role.'/home')}}">Home</a></li>
        <li><a href="{{url(Auth::user()->role.'/produk')}}">Produk</a></li>
        <li><a href="#">Penjualan</a></li>
        <li><a href="{{url(Auth::user()->role.'/laporan')}}">Laporan</a></li>
        <li>
            <form action="{{url('logout')}}" method="POST">
                @csrf
                <button type="submit" class="text-decoration-none bg-transparent border-0 text-white" style="font-size:18px;">Logout</button>
            </form>
        </li>
    </ul>
</div>
