@extends('layout')

@section('content')
    <style>
        .content-wrapper {
            background-color: #f4f5f7;
            padding: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            font-weight: bold;
        }

        .card .card-body {
            padding: 20px;
        }

        .btn {
            border-radius: 5px;
        }

        .table {
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: center;
        }
    </style>

    <div class="content-wrapper">
        <!-- Header Section -->
        {{-- <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Weather and Stats Section -->
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card" >
                <div class="row w-100">
                    <div class="card position-relative w-100">
                        <div class="card-body">
                            <canvas id="transaction-masuk"></canvas>
                            <canvas id="transaction-keluar"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    @php
                        $cards = [
                            ['title' => 'Total Jenis Buku', 'count' => $kategori],
                            [
                                'title' => 'Buku Sekolah Dasar (SD)',
                                'count' => $bukusd,
                            ],
                            [
                                'title' => 'Buku Sekolah Menengah Pertama (SMP)',
                                'count' => $bukusmp,
                            ],
                            ['title' => 'Buku Sekolah Menengah Atas', 'count' => $bukusma],

                            ['title' => 'Buku Sekolah Menengah Kejuruan', 'count' => $bukusmk],
                            ['title' => 'Buku Pendamping Guru', 'count' => $bukupendamping],

                            ['title' => 'Barang Masuk', 'count' => $transaksimasuk],
                            ['title' => 'Barang Keluar', 'count' => $transaksikeluar],
                        ];
                    @endphp

                    @foreach ($cards as $card)
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">{{ $card['title'] }}</p>
                                    <p class="fs-30 mb-2">{{ $card['count'] }}</p>
                                    {{-- <p>{{ $card['percentage'] }} (30 days)</p> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        var ctx = document.getElementById('transaction-masuk').getContext('2d');
        var labels = @json($labelstransaction);
        var data = @json($datatransaction);
        var myChart = new Chart(ctx, {
            type: 'bar', // You can change this to 'line', 'pie', etc.
            data: {
                labels: labels,
                datasets: [{
                    label: 'Grafik Transaksi Masuk',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: data,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        var ctx = document.getElementById('transaction-keluar').getContext('2d');
        var labels = @json($labelstransactionkeluar);
        var data = @json($datatransactionkeluar);
        // console.log(labels);
        var myChart = new Chart(ctx, {
            type: 'bar', // You can change this to 'line', 'pie', etc.
            data: {
                labels: labels,
                datasets: [{
                    label: 'Grafik Transaksi Keluar',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: data,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
