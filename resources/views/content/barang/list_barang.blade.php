@extends('base')
@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12 mt-2">
    <div class="card table-responsive">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="">
                <a href="{{ route('barang.create') }}" class="btn btn-sm shadow btn-success">
                    <i class="flaticon-381-plus"></i>
                    Tambah Barang</a>
            </form>
            <br>
            <center><h3>List Barang</h3></center>
            <table class="example display">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Gambar Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah Stok</th>
                        <th>Harga Jual Satuan</th>
                        <th>Keterangan</th>
                        <th width="50%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($barang as $item)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>
                            <img src="{{ asset('gambar_barang').'/'.($item->gambar_barang ?? 'default.jpg') }}" width="50px"></td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td> @Rp ($item->harga_barang)</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm shadow btn-warning">
                                        <i class="flaticon-381-edit"></i>
                                        Edit</a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="post">
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
