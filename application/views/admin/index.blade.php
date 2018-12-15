@extends('layouts.master')

@section('content')
    <div class="card mt-5 mb-5">
        <div class="card-header">
            Welcome Admin
        </div>
        <div class="card-body">
            @if($success != null)
                <div class="alert alert-success" role="alert">
                    {{$success}}
                </div>
            @endif

            <div class="row mt-3">
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{$totalTransaksi}}</h4>
                            <p class="mb-0">Total Transaksi Bulan Ini</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4>Rp. {!!number_format($totalPenjualan, 0, "", ".")!!}</h4>
                            <p class="mb-0">Penjualan Bulan Ini</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{$totalPorsi}}</h4>
                            <p class="mb-0">Total Porsi Terjual Bulan Ini</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-1">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Statistik Transaksi</h4>
                            <hr>
                            <canvas id="chart" class="w-100" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">

                <div class="col-md-4">
                    <div class="card text-white bg-success">
                        <div class="card-header">
                            Menu
                        </div>
                        <div class="card-body">
                            <p class="card-text">Menu yang tersedia ada <span class="badge badge-danger">{{$menu}}</span>.</p>
                            <p class="card-text">Klik tombol dibawah ini untuk melihat detailnya</p>
                            <a href="admin/menu" class="btn btn-warning">Manajemen Menu</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-dark bg-warning">
                        <div class="card-header">
                            Meja
                        </div>
                        <div class="card-body">
                            <p class="card-text">Meja yang ada <span class="badge badge-danger">{{$meja}}</span>.</p>
                            <p class="card-text">Klik tombol dibawah ini untuk melihat detailnya</p>
                            <a href="admin/meja" class="btn btn-primary">Manajemen Meja</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-info">
                        <div class="card-header">
                            Transaksi
                        </div>
                        <div class="card-body">
                            <p class="card-text">Ada <span class="badge badge-warning">{{$trans}}</span> Transaksi.</p>


                            <p class="card-text">Klik tombol dibawah ini untuk melihat detailnya</p>
                            <a href="transaksi" class="btn btn-danger">Manajemen Transaksi</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        var ctx = document.getElementById("chart").getContext('2d');
        
        var bulan = "{{$bulan}}";
        var bulan = bulan.replace(/&quot;/g, '\"');

        var jumlah = "{{$jumlah}}";
        var jumlah = jumlah.replace(/&quot;/g, '');

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: JSON.parse(bulan),
                datasets: [{
                    label: 'Jumlah Transaksi selama Setahun',
                    data: JSON.parse(jumlah),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endsection