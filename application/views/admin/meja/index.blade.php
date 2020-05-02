@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title">Management Tables</h5>
                </div>
                <div class="col-md-4 text-right">
                    <a class="btn btn-primary" href="/admin" role="button">Back</a>
                    <a class="btn btn-outline-primary " href="meja/add" role="button">Add New Table</a>
                </div>
            </div>
            
            
            <hr>
            @if(isset($success))
            <div class="alert alert-success" role="alert">
                {{$success}}
            </div>
            @endif
            
            @if($meja == null)
                <div class="alert alert-info" role="alert">
                    Table Not Found
                </div>
            @else
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="row">Number</th>
                            <th>Seats</th>
                            <th>Status</th>
                            <th>QR Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($meja as $key)
                            <tr>
                                <th scope="row">{{$key->no_meja}}</th>
                                <td>{{$key->kuota}} guests</td>
                                <td>
                                    @if($key->status)
                                        <h5><span class="badge badge-pill badge-success">Available</span></h5>
                                    @else
                                        <h5><span class="badge badge-pill badge-danger">Full</span></h5>
                                    @endif
                                </td>
                                <td><img src="/assets/qrcode/{{$key->qrcode}}" width="40"></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="meja/qr/{{$key->id}}" class="btn btn-sm btn-primary">Print QR</a>
                                        <a href="meja/edit/{{$key->id}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="meja/delete/{{$key->id}}" class="btn btn-sm btn-danger">Delete</a>
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