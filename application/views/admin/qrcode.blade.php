<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ base_url() }}assets/css/bootstrap.min.css">
    <title>Qrcode</title>
</head>
<body onload="window.print()">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5 text-center">
                <h2 class="text-primary mb-4">Table Number {{$meja->no_meja}}</h2>
                <img src="/assets/qrcode/{{$meja->qrcode}}" width="300" class="img-thumbnail">
                <small class="form-text text-muted">Scan this QR code to order a menu<br>*Allow Use of the Camera on the Website</small>
            </div>
        </div>
    </div>
</body>
</html>