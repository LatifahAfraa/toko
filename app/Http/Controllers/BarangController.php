<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('content.barang.list_barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.barang.create_barang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Barang $barang)
    {

        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' =>'required',
            'gambar_barang' =>'nullable|image',
            'satuan' =>'required',
            'jumlah_stok' =>'required',
            'harga_barang' =>'required',
            'keterangan' =>'nullable',

        ]);

        if($request->hasFile('gambar_barang')){
            $data['gambar_barang'] = time().'.'.$request->file('gambar_barang')->getClientOriginalExtension();//name
            $request->file('gambar_barang')->move('gambar_barang/', $data['gambar_barang']);//name, folder di publik move
        }
        else{
            $data['gambar_barang'] = null;
        }

        $data=[
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'gambar_barang' => $data['gambar_barang'],
            'satuan' => $request->satuan,
            'jumlah_stok' => $request->jumlah_stok,
            'harga_barang' => $request->harga_barang,
            'keterangan' => $request->keterangan,
        ];

        $barang->insert($data);
        return redirect()->route('barang.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('content.barang.edit_barang', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {

        if($request->hasFile('gambar_barang')){
            $data['gambar_barang'] = time().'.'.$request->file('gambar_barang')->getClientOriginalExtension();
            $request->file('gambar_barang')->move('gambar_barang/', $data['gambar_barang']);

            if($barang->gambar_barang != null) {
                File::delete(public_path('gambar_barang/'.$barang->gambar_barang));
            }
        }
        else{
            $gambar_lama = $barang->gambar_barang;
            $data['gambar_barang'] = $gambar_lama;
        }

        $data=[
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'gambar_barang' => $data['gambar_barang'],
            'satuan' => $request->satuan,
            'jumlah_stok' => $request->jumlah_stok,
            'harga_barang' => $request->harga_barang,
            'keterangan' => $request->keterangan,
        ];
        $barang->update($data);
        return redirect()->route('barang.index')->with('success', 'Data berhasil diganti');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        File::delete(public_path('gambar_barang/'.$barang->gambar_barang));
        $barang->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
