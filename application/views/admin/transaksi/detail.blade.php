@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-5 justify-content-center mx-auto">
            <div class="card mt-5 mx-auto">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Detail Transaksi</h5>
                        </div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-sm btn-primary" href="/transaksi" role="button">Kembali</a>
                        </div>
                    </div>
                    
                    <hr>
                    <dl class="row">
                        <dt class="col-sm-3">No Transaksi</dt>
                        <dd class="col-sm-9">{{$trans[0]->transID}}</dd>

                        <dt class="col-sm-3">Tgl Transaksi</dt>
                        <dd class="col-sm-9">{!!date('d M Y', $trans[0]->tgl_trans)!!}</dd>

                        <dt class="col-sm-3">No Meja</dt>
                        <dd class="col-sm-9">{{$trans[0]->no_meja}}</dd>

                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9 mb-4">{{$trans[0]->status_pembayaran ? 'Sudah Dibayar' : 'Sedang Berlangsung'}}</dd>
                        
                        <dt class="col-sm-4 mb-1">Menu</dt>
                        <dt class="col-sm-3 mb-1">Harga</dt>
                        <dt class="col-sm-2 mb-1">Jumlah</dt>
                        <dt class="col-sm-3 mb-1 text-right">Sub Total</dt>

                        @foreach($trans as $key)
                            <dd class="col-sm-4">{{$key->nama_menu}}</dd>
                            <dd class="col-sm-3">Rp {!!number_format($key->harga)!!}</dd>
                            <dd class="col-sm-2 text-center">{{$key->jumlah_pesanan}}</dd>
                            <dd class="col-sm-3 text-right">Rp {!!number_format($key->total)!!}</dd>
                        @endforeach


                        <dt class="col-sm-9 text-right">Grand Total</dt>
                        <dt class="col-sm-3 text-right">Rp {!!number_format($trans[0]->total_harga)!!}</dt>
                        
                    </dl>
                    
                    @if(!$trans[0]->status_pembayaran)
                        <a href="/transaksi/selesai/{{$trans[0]->transID}}" class="btn btn-success">Dibayar</a>
                    @endif
                    <a href="/print/{{$trans[0]->transID}}" class="btn btn-primary btn-lg btn-block mt-5">Print Invoice</a>
                </div>
            </div>
        </div>
    </div>
@endsection