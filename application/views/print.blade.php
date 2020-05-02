<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ base_url() }}assets/css/bootstrap.min.css">
    <title>Invoice</title>
</head>
<body onload="window.print()">
    <div class="container mt-4">
        <h3>Resto App INVOICE  <small class="text-muted">INV/RST/{{$trans[0]->no_meja}}/{{$trans[0]->transID}}/{!!date('dmY', $trans[0]->tgl_trans)!!}</small></h3>
        <hr>

        <dl class="row">
            <dt class="col-sm-3">Transaction ID</dt>
            <dd class="col-sm-9">{{$trans[0]->transID}}</dd>

            <dt class="col-sm-3">Date</dt>
            <dd class="col-sm-9">{!!date('d M Y', $trans[0]->tgl_trans)!!}</dd>

            <dt class="col-sm-3">Table</dt>
            <dd class="col-sm-9">{{$trans[0]->no_meja}}</dd>

            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9 mb-4">{{$trans[0]->status_pembayaran ? 'Sudah Dibayar' : 'Sedang Berlangsung'}}</dd>
            
            <dt class="col-sm-4 mb-1">Menu</dt>
            <dt class="col-sm-3 mb-1">Price</dt>
            <dt class="col-sm-2 mb-1 text-center">Quantity</dt>
            <dt class="col-sm-3 mb-1 text-right">Sub Total</dt>

            @foreach($trans as $key)
                <dd class="col-sm-4">{{$key->nama_menu}}</dd>
                <dd class="col-sm-3">USD {!!number_format($key->harga)!!}</dd>
                <dd class="col-sm-2 text-center">{{$key->jumlah_pesanan}}</dd>
                <dd class="col-sm-3 text-right">USD {!!number_format($key->total)!!}</dd>
            @endforeach


            <dt class="col-sm-9 text-right">Grand Total</dt>
            <dt class="col-sm-3 text-right">USD {!!number_format($trans[0]->total_harga)!!}</dt>
            
        </dl>

        <p class="lead">This information is a computer printout and does not require a signature</p>
    </div>
</body>
</html>