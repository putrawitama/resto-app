@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            Welcome Admin
        </div>
        <div class="card-body">
            <h5 class="card-title">Selamat datang di halaman dashboard admin.</h5>
            @if($success != null)
                <div class="alert alert-success" role="alert">
                    {{$success}}
                </div>
            @endif
            <div class="row mt-5">

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
@endsection