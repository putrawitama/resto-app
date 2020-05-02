@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title">Management Transactions</h5>
                </div>
            </div>
            <hr>

            @if($trans == null)
                <div class="alert alert-info" role="alert">
                    Transaction not Found
                </div>
            @else
                @php
                    $i = 0;
                @endphp
            
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Number Transaction</th>
                            <th class="text-center" scope="col">Date</th>
                            <th class="text-center" scope="col">Table</th>
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">Grand Total</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trans as $key)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <th class="text-center" scope="row">{{$key->id}}</th>
                                <td class="text-center">{!!date('d M Y', $key->tgl_trans)!!}</td>
                                <td class="text-center">{{$key->no_meja}}</td>
                                <td class="text-center">{{$key->status_pembayaran ? 'Already Paid' : 'Ongoing'}}</td>
                                <td>USD {!!number_format($key->total_harga)!!}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="/transaksi/detail/{{$key->id}}" class="btn btn-outline-primary">Detail</a>
                                        <a href="/transaksi/selesai/{{$key->id}}" class="btn btn-success">Pay</a>
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