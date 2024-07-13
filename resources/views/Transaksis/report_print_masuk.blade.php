<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Masuk</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-size: 10pt;
            margin: 0;
            padding: 20px;
        }

        .report-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #dee2e6;
        }

        .report-header img {
            width: 60px;
            vertical-align: middle;
        }

        .report-header h1 {
            margin: 10px 0 5px 0;
            font-size: 16pt;
        }

        .report-header p {
            margin: 5px 0;
            font-size: 12pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        table th {
            background-color: #343a40;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 10pt;
            }

            .report-header {
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 2px solid #dee2e6;
            }

            .report-header img {
                width: 60px;
            }

            .report-header h1 {
                margin: 10px 0 5px 0;
                font-size: 16pt;
            }

            .report-header p {
                margin: 5px 0;
                font-size: 12pt;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                font-size: inherit;
                margin-bottom: 20px;
            }

            table th,
            table td {
                padding: 10px;
                text-align: left;
                border: 1px solid #dee2e6;
            }

            table th {
                background-color: #343a40;
                color: #fff;
            }

            table tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        }
    </style>
</head>

<body>
    <div class="report-header">
        <img src="/dashboard/images/logointan.png" alt="Logo">
        <h1>Laporan Barang Masuk</h1>
        <p>PT Intan Pariwara Palembang</p>
        <p>{{ $start_date }} - {{ $end_date }}</p>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nomor Transaksi</th>
                <th>Tanggal Masuk</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Jumlah Masuk</th>
                <th>Rak</th>
                <th>Total Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->no_transaksi }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->barang->judul }}</td>
                    <td>{{ $item->barang->kategori->jenjang }}/{{ $item->barang->kategori->kelas }}</td>
                    <td>{{ $item->jumlah_masuk }}</td>
                    <td>{{ $item->rak->no_rak ?? 'N/A' }}</td>
                    <td>{{ $item->total_stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @can('transaksi-masuk-cetak')
        <script>
            window.print();
        </script>
    @endcan
</body>

</html>
