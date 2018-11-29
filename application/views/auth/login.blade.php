@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4 justify-content-center mx-auto">
            <div class="card mt-5 mx-auto">
                <div class="card-body">

                    <h4>Login</h4>
                    <hr>
                    @if($error != null)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endif

                    <form action="postLogin" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection