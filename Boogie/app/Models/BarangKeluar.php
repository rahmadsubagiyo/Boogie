<?php

// app\Models\BarangKeluar.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $fillable = ['barang_masuk_id', 'quantity'];

    public function barangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class);
    }
}
