@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title">Manajemen Menu</h5>
                </div>
                <div class="col-md-4 text-right">
                    <a class="btn btn-primary" href="/admin" role="button">Kembali</a>
                    <a class="btn btn-outline-primary " href="menu/add" role="button">Tambah Menu Baru</a>
                </div>
            </div>

            <hr>

            @if(isset($success))
                <div class="alert alert-success" role="alert">
                    {{$success}}
                </div>
            @endif
            
            @if($menu == null)
                <div class="alert alert-info" role="alert">
                    Tidak ada Meja Ditemukan
                </div>
            @else
                @php
                    $i = 0;
                @endphp
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Category</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menu as $key)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$key->nama_menu}}</td>
                                <td>{{$key->kategori}}</td>
                                <td>Rp. {{$key->harga}}</td>
                                <td>{{$key->status ? 'Tersedia' : 'Kosong'}}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="menu/detail/{{$key->id}}" class="btn btn-outline-primary">Detail</a>
                                        <a href="menu/edit/{{$key->id}}" class="btn btn-outline-success">Edit</a>
                                        <a href="menu/delete/{{$key->id}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection