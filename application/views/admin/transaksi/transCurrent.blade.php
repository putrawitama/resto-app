@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title">Manajemen Transaksi</h5>
                </div>
            </div>
            <hr>

            @if($trans == null)
                <div class="alert alert-info" role="alert">
                    Tidak ada Transaksi Ditemukan
                </div>
            @else
                @php
                    $i = 0;
                @endphp
            
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No Transaksi</th>
                            <th class="text-center" scope="col">Tanggal</th>
                            <th class="text-center" scope="col">No Meja</th>
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
                                <td class="text-center">{{$key->status_pembayaran ? 'Sudah Dibayar' : 'Sedang Berlangsung'}}</td>
                                <td>Rp {!!number_format($key->total_harga)!!}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="/transaksi/detail/{{$key->id}}" class="btn btn-outline-primary">Detail</a>
                                        <a href="/transaksi/selesai/{{$key->id}}" class="btn btn-success">Dibayar</a>
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