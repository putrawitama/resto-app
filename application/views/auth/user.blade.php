@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title">List User</h5>
                </div>
                <div class="col-md-4 text-right">
                    <a class="btn btn-primary" href="/admin" role="button">Back</a>
                    <a class="btn btn-outline-primary " href="/register" role="button">Add New User</a>
                </div>
            </div>
            
            
            <hr>
            @if(isset($success))
            <div class="alert alert-success" role="alert">
                {{$success}}
            </div>
            @endif
            
            @if($user == null)
                <div class="alert alert-info" role="alert">
                    User Not Found
                </div>
            @else
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach($user as $key)
                        @php
                            $i++;
                        @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$key->nama}}</td>
                                <td>{{$key->username}}</td>
                                <td>
                                    @if($key->status)
                                        <h5><span class="badge badge-pill badge-success">Active</span></h5>
                                    @else
                                        <h5><span class="badge badge-pill badge-danger">Deactive</span></h5>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="/user/changeStatus/{{$key->id}}" class="btn btn-sm {{$key->status ? 'btn-danger' : 'btn-success'}}">{{$key->status ? 'Deactivate' : 'Activate'}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection