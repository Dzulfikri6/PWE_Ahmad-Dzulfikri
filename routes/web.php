<?php

use App\Http\Controllers\ContohController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('component.home');
});

Route::get('/produk', function () {
    return view('component.produk');
});

Route::get('/',[homepageController::class, 'homeView']);
Route::get('/produk',[ProdukController::class, 'viewProduk']);

Route::get('/produk/add',[ProdukController::class, 'ViewAddProduk']);
Route::post('/produk/add',[ProdukController::class, 'CreateProduk']);

Route::delete('/produk/delete/{kode_produk}',[ProdukController::class,'deleteProduk']);

Route::get('/produk/edit/{kode_produk}',[ProdukController::class,'viewEditProduk']);
Route::put('/produk/edit/{kode_produk}',[ProdukController::class,'updateProduk']);
