@extends('layouts.master')

@section('content')

    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title">Detail Menu</h5>
                </div>
                <div class="col-md-4 text-right">
                    <a class="btn btn-primary" href="/admin/menu" role="button">Back</a>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-2">
                    <img src="{{$menu->foto}}" alt="Foto" class="img-thumbnail">
                </div>

                <div class="col-md-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Menu {{$menu->nama_menu}}</li>
                        <li class="list-group-item">{{$menu->deskripsi}}</li>
                        <li class="list-group-item">Category {{$menu->kategori}}</li>
                        <li class="list-group-item">Price USD {{$menu->harga}}</li>
                        <li class="list-group-item">Stock {{$menu->status ? 'Tersedia' : 'Tidak Tersedia'}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection