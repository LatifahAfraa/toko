<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table,td,th {
            border: 1px solid;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }
    </style>
    <title>Cetak Laporan Penjualan</title>
</head>
<body>
    <div class="container-fluid">
       <center> <h2> Cetak Laporan Penjualan {{ date('d F Y', strtotime($today)) }}</h2>


        <table>
            <thead>
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
                    $total = 0;
                @endphp
                @foreach ($penjualan as $item)
                @php
                    $total +=$item->total_harga;
                @endphp
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->kode_transaksi }}</td>
                    <td>{{ $item->barang->nama_barang}}</td>
                    <td>{{ $item->barang->satuan }}</td>
                    <td>{{ $item->jumlah_beli }}</td>
                    <td>{{ $item->diskon }} %</td>
                    <td>@Rp($item->total_harga)</td>
                    @endforeach
            </tbody>
            <tfoot>
                <tr>
                <th colspan="6">Total Harga Keseluruhan</th>
                <th>@Rp($total)</th>
            </tr>
            </tfoot>
        </table>
       </center>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
