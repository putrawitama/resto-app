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
                            <p class="mb-0">Total Transaction Current Month</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4>Rp. {!!number_format($totalPenjualan, 2, ",", ".")!!}</h4>
                            <p class="mb-0">This month's sales</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{$totalPorsi}}</h4>
                            <p class="mb-0">Total Portions Sold This Month</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-1">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Transaction Statistics</h4>
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
                            <p class="card-text">Menus available Count<span class="badge badge-danger">{{$menu}}</span>.</p>
                            <p class="card-text">Click the button below to see the details</p>
                            <a href="admin/menu" class="btn btn-warning">Management Menus</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-dark bg-warning">
                        <div class="card-header">
                            Meja
                        </div>
                        <div class="card-body">
                            <p class="card-text">Tables Available Count<span class="badge badge-danger">{{$meja}}</span>.</p>
                            <p class="card-text">Click the button below to see the details</p>
                            <a href="admin/meja" class="btn btn-primary">Management Tables</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-info">
                        <div class="card-header">
                            Transactions
                        </div>
                        <div class="card-body">
                            <p class="card-text">Transaction Count <span class="badge badge-warning">{{$trans}}</span>.</p>


                            <p class="card-text">Click the button below to see the details</p>
                            <a href="transaksi" class="btn btn-danger">Management Transactions</a>
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
                    label: 'Number of Transactions for a Year',
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