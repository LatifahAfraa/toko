<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable =[
        'kode_barang',
        'nama_barang',
        'gambar_barang',
        'satuan',
        'jumlah_stok',
        'harga_barang',
        'keterangan',
    ];
}
