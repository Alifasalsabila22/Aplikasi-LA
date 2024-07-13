<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 50px auto;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Data Transaksi {{ request('start_date') }} to {{ request('end_date') }}</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Masuk</th>
                    <th>No Transaksi</th>
                    <th>Barang</th>
                    <th>Gudang</th>
                    <th>Kategori</th>
                    <th>Jumlah Masuk</th>
                    <th>Total Stock</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->tanggal_masuk }}</td>
                        <td>{{ $data->no_transaksi }}</td>
                        <td>{{ $data->barang->judul ?? 'N/A' }}</td>
                        <td>{{ $data->gudang->lokasi_gudang ?? 'N/A' }}</td>
                        <td>{{ $data->kategori->jenjang }} / {{ $data->kategori->kelas }}</td>
                        <td>{{ $data->jumlah_masuk }}</td>
                        <td>{{ $data->total_stock }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11">No data found for the selected date range.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
