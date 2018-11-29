@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-5 justify-content-center mx-auto">
            <div class="card mt-5 mx-auto">
                <div class="card-body">
                    <h4>Tambah User Baru</h4>
                    <hr>
                    @if($error != null)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endif

                    <form action="postRegiter" method="post">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="name" type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>User Lavel</label>
                            <select name="role" class="form-control">
                            <option value="">Pilih</option>
                            <option value="1">Administrator</option>
                            <option value="0">Waitress</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection