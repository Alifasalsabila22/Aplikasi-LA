<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Keluar</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-size: 10pt;
            margin: 20px;
        }

        .report-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .report-header img {
            width: 50px;
        }

        .report-header h1 {
            margin: 5px 0;
        }

        .report-header p {
            margin: 5px 0;
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

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .no-print {
            display: none;
        }

        @media print {
            body {
                font-size: 10pt;
                margin: 0;
                padding: 20px;
            }

            .report-header {
                margin-bottom: 20px;
                text-align: center;
            }

            .report-header img {
                width: 50px;
            }

            .report-header h1,
            .report-header p {
                margin: 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                font-size: inherit;
                margin: 0;
            }

            table th,
            table td {
                padding: 10px;
                border: 1px solid #dee2e6;
            }

            table th {
                background-color: #343a40;
                color: #fff;
            }

            table tbody tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="report-header">
        <img src="/dashboard/images/logointan.png" alt="Logo">
        <h1>Laporan Barang Keluar</h1>
        <p>PT Intan Pariwara Palembang</p>
        <p>{{ $start_date }} - {{ $end_date }}</p>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tanggal Keluar</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Rak</th>
                <th>Jumlah Keluar</th>
                <th>Total Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tanggal_keluar }}</td>
                    <td>{{ $item->barang->judul }}</td>
                    <td>{{ $item->barang->kategori->jenjang }}/{{ $item->barang->kategori->kelas }}</td>
                    <td>{{ $item->rak->no_rak ?? 'N/A' }}</td>
                    <td>{{ $item->jumlah_keluar }}</td>
                    <td>{{ $item->total_stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    @can('transaksi-keluar-cetak')
        <script>
            window.print();
        </script>
    @endcan
</body>

</html>
