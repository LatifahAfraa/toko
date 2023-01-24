@extends('base')
@section('content')

<div class="col-xl-12 col-lg-12 col-sm-12 mt-2">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <center><h3>Edit Barang</h3></center>

           <form action="{{ route('barang.update', $barang->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group row mb-1">
            <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
            <div class="col-sm-10">
                <input type="text" name="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" readonly>
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama barang</label>
            <div class="col-sm-10">
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}">
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="gambar_barang" class="col-sm-2 col-form-label">Gambar Barang</label>
            <div class="col-sm-10">
                <input type="file" name="gambar_barang" class="form-control">*Pilih jika ingin ganti gambar barang
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
            <div class="col-sm-10">
                <select class="form-control" id="satuan" name="satuan">
                       <option value="{{ $barang->satuan }}">{{ $barang->satuan }}</option>
                       <option value="Pcs">Pcs</option>
                       <option value="Pack">Pack</option>
                 </select>
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="jumlah_stok" class="col-sm-2 col-form-label">Jumlah Stok</label>
            <div class="col-sm-10">
                <input type="number" name="jumlah_stok" class="form-control" value="{{ $barang->jumlah_stok }}">
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="harga_barang" class="col-sm-2 col-form-label">Harga Satuan Barang</label>
            <div class="col-sm-10">
                <input type="number" name="harga_barang" class="form-control" value="{{ $barang->harga_barang }}">
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <input type="text" name="keterangan" class="form-control" value="{{ $barang->keterangan }}">
            </div>
        </div>

        <button type="submit" class="btn btn-success float-end mt-2">Simpan</button>


        </form>
        </div>
    </div>
</div>
@endsection
