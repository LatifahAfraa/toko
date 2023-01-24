<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $today = $request->tanggal ?? date('Y-m-d');
        $penjualan = Penjualan::where('tanggal_penjualan', $today)->get();
        return view('content.laporan.list_penjualan', compact('penjualan', 'today'));
    }

    public function cetak(Request $request)
    {
        $today = $request->tanggal ?? date('Y-m-d');
        $penjualan = Penjualan::where('tanggal_penjualan', $today)->get();
        return view('content.laporan.cetak_penjualan', compact('penjualan', 'today'));
    }


}
