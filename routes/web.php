<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('component.login');
});

Route::get('/login',[AuthController::class,'showLoginForm']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/register',[AuthController::class,'showRegisterForm']);
Route::post('/register',[AuthController::class,'Register']);

Route::post('/logout',[AuthController::class, 'logout']);

Route::middleware(['auth','user-access:user'])->prefix('user')->group(function(){
    Route::get('/home',[homepageController::class, 'homeView']);
    Route::get('/produk',[ProdukController::class, 'viewProduk']);

    Route::get('/produk/add',[ProdukController::class, 'ViewAddProduk']);
    Route::post('/produk/add',[ProdukController::class, 'CreateProduk']);

    Route::delete('/produk/delete/{kode_produk}',[ProdukController::class,'deleteProduk']);

    Route::get('/produk/edit/{kode_produk}',[ProdukController::class,'viewEditProduk']);
    Route::put('/produk/edit/{kode_produk}',[ProdukController::class,'updateProduk']);

    Route::get('/laporan',[ProdukController::class,'ViewLaporan']);
    Route::get('/report',[ProdukController::class,'print']);
});

Route::middleware(['auth','user-access:admin'])->prefix('admin')->group(function(){

    Route::get('/home',[homepageController::class, 'homeView']);
    Route::get('/produk',[ProdukController::class, 'viewProduk']);

    Route::get('/produk/add',[ProdukController::class, 'ViewAddProduk']);
    Route::post('/produk/add',[ProdukController::class, 'CreateProduk']);

    Route::delete('/produk/delete/{kode_produk}',[ProdukController::class,'deleteProduk']);

    Route::get('/produk/edit/{kode_produk}',[ProdukController::class,'viewEditProduk']);
    Route::put('/produk/edit/{kode_produk}',[ProdukController::class,'updateProduk']);

    Route::get('/laporan',[ProdukController::class,'ViewLaporan']);
    Route::get('/report',[ProdukController::class,'print']);
});
