<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $fillable = ['nama_artikel', 'jenis', 'warna', 'kuantitas', 'barang_keluar', 'selisih', 'Harga'];

   
}
