<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homeView()
    {
        {
            $isAdmin = Auth::user()->role === 'admin';

            $produkPerHariQuery = Produk::selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->orderBy('date', 'asc');

            if (!$isAdmin) {
                $produkPerHariQuery->where('user_id', Auth::id());
            }

            // Execute the query to get results
            $produkPerHari = $produkPerHariQuery->get();

            $dates = [];
            $totals = [];

            foreach ($produkPerHari as $item) {
                $dates[] = Carbon::parse($item->date)->format('Y-m-d');
                $totals[] = $item->total;
            }

            $chart = LarapexChart::barChart()
                ->setTitle('Produk Ditambahkan Per Hari')
                ->setSubtitle('Data Penambahan Produk Harian')
                ->addData('Jumlah Produk', $totals)
                ->setXAxis($dates);

            $totalProductsQuery = Produk::query();
            if ($isAdmin) {
                // Jika admin, hitung semua pengguna terdaftar
                $registeredUsers = User::count();
            } else {
                // Jika bukan admin, hitung hanya pengguna yang sedang login
                $registeredUsers = User::where('id', Auth::id())->count();
            }
            $data = [
                'totalProducts' => $totalProductsQuery->count(),
                'salesToday' => 130,
                'totalRevenue' => 'Rp 75.000.000',
                'registeredUsers' => $registeredUsers,
                'chart' => $chart,
            ];

            return view('component.home', $data);
        }
    }
}
