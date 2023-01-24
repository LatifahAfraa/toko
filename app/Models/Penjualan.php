<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable= [
        'kode_transaksi',
        'kode_barang',
        'jumlah_beli',
        'diskon',
        'total_harga',
        'tanggal_penjualan',
    ];

    public function barang():BelongsTo
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}
