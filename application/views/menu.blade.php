<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ base_url() }}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ base_url() }}assets/css/costum.css">
    <title>Resto Bumi</title>
</head>
<body>

    <nav class="navbar shadow-sm sticky-top navbar-expand-lg navbar-dark bg-tosca">
        <a class="navbar-brand" href="/">Resto App</a>
        <a href="selesai" class="ml-auto btn btn-sm btn-danger">
            Done
        </a>
    </nav>

    @if($error)
        <div class="alert alert-warning mx-2 mt-3" role="alert">
            {{$error}}
        </div>
    @endif
    @if($success)
        <div class="alert alert-success mx-2 mt-3" role="alert">
            {{$success}}
        </div>
    @endif
    <div class="bg-white w-100 py-3 mt-3">
        <div class="container">
            <h5>Foods</h5>
            <hr>

            @if($makanan == null)
                <div class="alert alert-info" role="alert">
                    Not Available
                </div>
            @else
                @foreach($makanan as $key)
                    <div class="row mb-3">
                        <div class="col-3">
                            <img src="{{$key->foto}}" class="img-thumbnail w-100">
                        </div>

                        <div class="col-9">
                            <h6>{{$key->nama_menu}}</h6>
                            <p><small>{{$key->deskripsi}}</small></p>
                            <p class="mb-0"><small><b>Rp. {{$key->harga}}</b></small></p>

                            <div class="form-row justify-content-end">
                                <div class="col-3">
                                    <input type="number" name="jumlah" id="{{$key->id}}" class="form-control  form-control-sm" placeholder="0">
                                </div>
                                <div class="col-3">
                                    <button class="add_cart btn btn-sm btn-success" type="button" data-menuid="{{$key->id}}" data-menunama="{{$key->nama_menu}}" data-menuharga="{{$key->harga}}">ADD</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="bg-white w-100 py-3 mt-2">
        <div class="container">
            <h5>Drinks</h5>
            <hr>

            @if($minuman == null)
                <div class="alert alert-info" role="alert">
                    Not Available
                </div>
            @else
                @foreach($minuman as $key)
                <div class="row mb-3">
                        <div class="col-3">
                            <img src="{{$key->foto}}" class="img-thumbnail w-100">
                        </div>

                        <div class="col-9">
                            <h6>{{$key->nama_menu}}</h6>
                            <p><small>{{$key->deskripsi}}</small></p>
                            <p class="mb-0"><small><b>Rp. {{$key->harga}}</b></small></p>

                            <div class="form-row justify-content-end">
                                <div class="col-3">
                                    <input type="number" name="jumlah" id="{{$key->id}}" class="form-control  form-control-sm" placeholder="0">
                                </div>
                                <div class="col-3">
                                    <button class="add_cart btn btn-sm btn-success" type="button" data-menuid="{{$key->id}}" data-menunama="{{$key->nama_menu}}" data-menuharga="{{$key->harga}}">ADD</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="bg-white w-100 py-3 mt-2 mb-2">
        <div class="container">
            <h5>Snacks</h5>
            <hr>

            @if($camilan == null)
                <div class="alert alert-info" role="alert">
                    Not Available
                </div>
            @else
                @foreach($camilan as $key)
                <div class="row mb-3">
                        <div class="col-3">
                            <img src="{{$key->foto}}" class="img-thumbnail w-100">
                        </div>

                        <div class="col-9">
                            <h6>{{$key->nama_menu}}</h6>
                            <p><small>{{$key->deskripsi}}</small></p>
                            <p class="mb-0"><small><b>Rp. {{$key->harga}}</b></small></p>

                            <div class="form-row justify-content-end">
                                <div class="col-3">
                                    <input type="number" name="jumlah" id="{{$key->id}}" class="form-control  form-control-sm" placeholder="0">
                                </div>
                                <div class="col-3">
                                    <button class="add_cart btn btn-sm btn-success" type="button" data-menuid="{{$key->id}}" data-menunama="{{$key->nama_menu}}" data-menuharga="{{$key->harga}}">ADD</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <footer class="mb-30 w-100 pb-3 fixed-bottom" id="report">
        <div class="container">
            <div class="card bg-blue border-0 shadow">
                <div class="card-body p-3 text-white">
                    <div class="row">
                        <div class="col-9">
                            <p class="mb-0" id="total"></p>
                            <p class="mb-0"><small>Klik untuk melihat pesanan</small></p>
                        </div>
                        <div class="col-3 align-self-center text-center">
                            <h3>🍽</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row px-2">
                        <div class="col-2 px-1 text-left">
                            <small><b>Menu</b></small>
                        </div>
                        <div class="col-2 px-1 text-center">
                            <small><b>Qty</b></small>
                        </div>
                        <div class="col-3 px-1 text-right">
                            <small><b>Price</b></small>
                        </div>
                        <div class="col-4 px-1 text-right">
                            <small><b>Total</b></small>
                        </div>
                        <div class="col-1 px-1 text-center">
                        </div>
                    </div>
                    
                    <div id="detail">
                        
                    </div>
                </div>
                <a href="order" class="btn btn btn-warning mx-1 my-1">Order</a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ base_url() }}assets/js/jquery3.3.1.min.js"></script>
    <script type="text/javascript" src="{{ base_url() }}assets/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var hide = true;
            $('.add_cart').click(function(){
                var menu_id    = $(this).data("menuid");
                var menu_nama  = $(this).data("menunama");
                var menu_harga = $(this).data("menuharga");
                var jumlah     = $('#' + menu_id).val();
                if (hide) {
                    $("#report").toggleClass('mb-30 mb-0');
                    hide = false;
                }
                $.ajax({
                    url : "{{base_url()}}index.php/addCart",
                    method : "POST",
                    data : {id: menu_id, name: menu_nama, harga: menu_harga, jumlah: jumlah},
                    success: function(data){
                        let datas = JSON.parse(data);
                        console.log(datas);
                        $('#detail').html(datas.cart);
                        document.getElementById("total").innerHTML="<small><b>"+ datas.item +" Items | Total Rp "+ datas.total +"</b></small>";
                    }
                });
            });

            $('#detail').load("{{base_url()}}index.php/cart");

            $(document).on('click','.del',function(){
                var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
                $.ajax({
                    url : "{{base_url()}}index.php/delCart",
                    method : "POST",
                    data : {row_id : row_id},
                    success :function(data){
                        $('#detail').html(data);
                    }
                });
            });

            window.onscroll = () => {
                if(!hide){
                    if(this.scrollY <= this.scrollHeight) {
                        $("#report").toggleClass('mb-30 mb-0');
                    } else {
                        $("#report").toggleClass('mb-0 mb-30');
                    }
                }
            };

            $('#report').on('click', function(event) {
                $('#myModal').modal('show')
            });

            var $htmlOrBody = $('html, body'), // scrollTop works on <body> for some browsers, <html> for others
                scrollTopPadding = 4;

            $('input').focus(function() {
                // get textarea's offset top position
                var textareaTop = $(this).offset().bottom;
                if(!hide) {
                    $("#report").toggleClass('mb-0 mb-30');
                    hide = true;
                }
                // scroll to the textarea
                $htmlOrBody.scrollTop(textareaTop - scrollTopPadding);
            });
        });
    </script>
</body>
</html>