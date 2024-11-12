<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function viewProduk()
    {
    $isAdmin = Auth::user()->role == 'admin';

    // Jika admin, tampilkan semua produk, jika user biasa, tampilkan produk yang terkait dengan user tersebut
    if ($isAdmin) {
        $produk = Produk::all(); // Admin dapat melihat semua produk
    } else {
        $produk = Produk::where('user_id', Auth::user()->id)->get(); // User hanya melihat produk yang terkait dengan dirinya
    }

    return view('component.produk', ['produk' => $produk]);
    }
    public function CreateProduk(Request $request){
        $imageName=null;
        if($request->hasFile('image')){
            $imageFile=$request->file('image');
            $imageName=time().'_'.$imageFile->getClientOriginalName();
            $imageFile->storeAs('public/image',$imageName);
        }
        produk::create([
            'nama_produk'=>$request->nama_produk,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'jumlah_produk'=>$request->jumlah_produk,
            'image'=>$imageName,
            'user_id'=>Auth::user()->id
        ]);
        return redirect(Auth::user()->role.'/produk');
    }
    public function ViewAddProduk(){
        return view('component.addProduk');
    }
    public function deleteProduk($kode_produk){
        produk::where('kode_produk',$kode_produk)->delete();
        return redirect(Auth::user()->role.'/produk');
    }

    public function viewEditProduk($kode_produk){
        $ubahproduk=Produk::where('kode_produk',$kode_produk)->first();
        return view('component.editProduk', compact('ubahproduk'));
    }

    public function updateProduk(Request $request,$kode_produk){
        $imageName=null;
        if($request->hasFile('image')){
            $imageFile=$request->file('image');
            $imageName=time().'_'.$imageFile->getClientOriginalName();
            $imageFile->storeAs('public/image',$imageName);
        }
        Produk::where('kode_produk', $kode_produk)->update([
            'nama_produk'=>$request->nama_produk,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'jumlah_produk'=>$request->jumlah_produk,
            'image'=>$imageName
        ]);
        return redirect(Auth::user()->role.'/produk');
    }
    public function ViewLaporan(){
        $products=Produk::all();
        return view('component.laporan',['products'=>$products]);
    }
    public function print(){
        $products=Produk::all();
        $pdf=Pdf::loadView('component.report',compact('products'));
        return $pdf->stream('laporan-produk.pdf');
    }
}
