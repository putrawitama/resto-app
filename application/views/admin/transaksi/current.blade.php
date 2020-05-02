@extends('layouts.master')

@section('content')
    <div class="mt-3">
        <h2>Orders</h2>
        <hr class="mb-5">

        <div id="proses">
            
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            window.setInterval(function(){
                $.ajax({
                    url : "{{base_url()}}index.php/current-api",
                    method : "GET",
                    success: function(data){
                        let datas = JSON.parse(data);
                        console.log(datas);
                        $('#proses').html(datas);
                    }
                });
            }, 60000);
            $('#proses').load("{{base_url()}}index.php/current-api");
        });
    </script>
@endsection