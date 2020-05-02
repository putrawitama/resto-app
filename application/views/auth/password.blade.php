@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4 justify-content-center mx-auto">
            <div class="card mt-5 mx-auto">
                <div class="card-body">

                    <h4>Change Password</h4>
                    <hr>
                    @if($error != null)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endif

                    <form action="postChange/{{$user->id}}" method="post">
                        <div class="form-group">
                            <label>New Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label>Confirmation Password</label>
                            <input name="passconf" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection