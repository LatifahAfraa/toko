@extends('base')
@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12 mt-2">
    <div class="card table-responsive">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="">
                <a href="{{ route('penjualan.create') }}" class="btn btn-sm shadow btn-success">
                    <i class="flaticon-381-plus"></i>
                    Tambah Penjualan</a>
            </form>
            <br>
            <center><h3>List Penjualan</h3></center>
            <table class="example display">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Kode Barang</th>
                        <th>Jumlah Beli</th>
                        <th>Diskon</th>
                        <th>Total Harga</th>
                        <th>Tanggal Penjualan</th>
                        <th>Aksi</th>
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
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->jumlah_beli }}</td>
                        <td>{{ $item->diskon }} %</td>
                        <td>@Rp($item->total_harga)</td>
                        <td>{{ date('d-m-Y', strtotime($item->tanggal_penjualan)) }}</td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('penjualan.edit', $item->id) }}" class="btn btn-sm shadow btn-warning">
                                        <i class="flaticon-381-edit"></i>
                                        Edit</a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('penjualan.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm shadow btn-danger">
                                        <i class="flaticon-381-trash"></i>
                                        Hapus</button>
                                </form>
                                </div>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
