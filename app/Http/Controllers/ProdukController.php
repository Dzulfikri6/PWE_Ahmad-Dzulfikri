<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewProduk()
    {
        $produk=Produk::all();
        return view('component.produk',['produk'=>$produk]);
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
            'image'=>$imageName
        ]);
        return redirect('/produk');
    }
    public function ViewAddProduk(){
        return view('component.addProduk');
    }
    public function deleteProduk($kode_produk){
        produk::where('kode_produk',$kode_produk)->delete();
        return redirect('/produk');
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
        return redirect('/produk');
    }
}
