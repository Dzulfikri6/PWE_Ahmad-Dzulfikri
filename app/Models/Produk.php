<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_produk';

    protected $table='produks';
    protected $fillable=['kode_produk', 'nama_produk', 'deskripsi','harga','jumlah_produk', 'image', 'create_at','update_at', 'user_id'];
}
