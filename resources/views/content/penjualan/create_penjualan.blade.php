@extends('base')
@section('content')

<div class="col-xl-12 col-lg-12 col-sm-12 mt-2">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <center><h3>Tambah Penjualan</h3></center>
           <form action="{{ route('penjualan.store') }}" method="post">
        @csrf
        <div class="form-group row mb-1">
            <label for="kode_transaksi" class="col-sm-2 col-form-label">Kode Transaksi</label>
            <div class="col-sm-10">
                <input type="text" name="kode_transaksi" class="form-control">
            </div>
        </div>



        <div class="form-group row mb-1">
            <label for="kode_barang" class="col-sm-2 col-form-label">Kode barang</label>
            <div class="col-sm-10">
                <select class="form-control" id="kode_barang" name="kode_barang">
                    @foreach ($barang as $item)
                       <option value="{{ $item->kode_barang }}">{{ $item->nama_barang }}</option>
                    @endforeach
                 </select>
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="jumlah_beli" class="col-sm-2 col-form-label">Jumlah Beli</label>
            <div class="col-sm-10">
                <input type="number" name="jumlah_beli" class="form-control">
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="diskon" class="col-sm-2 col-form-label">Diskon</label>
            <div class="col-sm-10">
                <input type="number" name="diskon" class="form-control" value="0">
            </div>
        </div>



        <div class="form-group row mb-1">
            <label for="tanggal_penjualan" class="col-sm-2 col-form-label">Tanggal Penjualan</label>
            <div class="col-sm-10">
                <input type="date" name="tanggal_penjualan" class="form-control" >
            </div>
        </div>

        <button type="submit" class="btn btn-success float-end mt-2">Simpan</button>


        </form>
        </div>
    </div>
</div>
@endsection
