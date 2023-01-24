@extends('base')
@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12 mt-2">
    <div class="card table-responsive">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">

                    <a href="{{ route('cetak', ['tanggal' => request()->get('tanggal') ]) }}" class="btn btn-success btn-sm"><i class="flaticon-381-print"></i> Cetak Laporan</a>
                </div>
                <div class="col">
                    <form method="get" action="" class="form-inline float-right">
                        <div class="input-group">
                            <input class="form-control date" type="date" name="tanggal" id="tanggal" value="{{$today}}">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-primary ">Telusuri</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <center><h3>List Laporan Penjualan</h3></center>
            <table class="example display">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah Beli</th>
                        <th>Diskon</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($penjualan as $item)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->kode_transaksi }}</td>
                        <td>{{ $item->barang->nama_barang}}</td>
                        <td>{{ $item->barang->satuan }}</td>
                        <td>{{ $item->jumlah_beli }}</td>
                        <td>{{ $item->diskon }} %</td>
                        <td>@Rp($item->total_harga)</td>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
