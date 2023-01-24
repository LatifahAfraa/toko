<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('content.penjualan.list_penjualan', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang= Barang::all();
        return view('content.penjualan.create_penjualan', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'jumlah_beli' => 'required',
            'diskon' => 'required',
            'tanggal_penjualan' => 'required',
        ]);

        $barang= Barang::where('kode_barang',$request->kode_barang)->first();

        $harga_barang = $request->jumlah_beli * $barang->harga_barang;
        $diskon = 0;
        if($request->diskon > 0) {
            $diskon = $harga_barang * ($request->diskon/100);
        }
        $total_harga = $harga_barang - $diskon;


        $tanggal_penjualan = Carbon::parse($request->tanggal_penjualan)->format('Y-m-d');

        $data = [
            'kode_transaksi' => $request->kode_transaksi,
            'kode_barang' => $request->kode_barang,
            'jumlah_beli' => $request->jumlah_beli,
            'diskon' => $request->diskon,
            'total_harga' => $total_harga,
            'tanggal_penjualan' => $tanggal_penjualan,
        ];

        $jumlah=$barang->jumlah_stok - $request->jumlah_beli;
        $barang->update(['jumlah_stok'=>$jumlah]);
        $penjualan->insert($data);
        return redirect()->route('penjualan.index')->with('success', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Penjualan $penjualan)
    {
        $barang= Barang::all();
        return view('content.penjualan.edit_penjualan', compact('penjualan', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            //exists untuk memastikan data benar/ tidak
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'jumlah_beli' => 'required',
            'diskon' => 'required',
            'tanggal_penjualan' => 'required',
        ]);

        $barang= Barang::where('kode_barang',$request->kode_barang)->first();

        $harga_barang = $request->jumlah_beli * $barang->harga_barang;
        $diskon = 0;
        if($request->diskon > 0) {
            $diskon = $harga_barang * ($request->diskon/100);
        }
        $total_harga = $harga_barang - $diskon;


        $tanggal_penjualan = Carbon::parse($request->tanggal_penjualan)->format('Y-m-d');

        $data = [
            'kode_transaksi' => $request->kode_transaksi,
            'kode_barang' => $request->kode_barang,
            'jumlah_beli' => $request->jumlah_beli,
            'diskon' => $request->diskon,
            'total_harga' => $total_harga,
            'tanggal_penjualan' => $tanggal_penjualan,
        ];

        $jumlah = $barang->jumlah_stok + $penjualan->jumlah_beli;
        $jumlah= $jumlah - $request->jumlah_beli;
        $barang->update(['jumlah_stok'=>$jumlah]);

        $penjualan->update($data);
        return redirect()->route('penjualan.index')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        $barang= Barang::where('kode_barang',$penjualan->kode_barang)->first();
        $jumlah = $barang->jumlah_stok + $penjualan->jumlah_beli;
        $barang->update(['jumlah_stok'=>$jumlah]);

        $penjualan->delete();
        return back()->with('success','Data berhasil dihapus');
    }
}
