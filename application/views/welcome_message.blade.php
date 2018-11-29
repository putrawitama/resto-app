<!DOCTYPE html>
<html>
  <head>
  	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ base_url() }}assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ base_url() }}assets/css/costum.css">
    <title>Resto Bumi</title>
    <script type="text/javascript" src="{{ base_url() }}assets/js/instascan.min.js"></script>
  </head>
  <body onload="camera()">

	<div class="overflow-hidden text-center">
		<video id="preview" class="h-100 w-auto mx-auto"></video>
	</div>
	<div class="container position-absolute top-scanner">
		<div class="row justify-content-center my-5">
			<div class="col-md-4 text-center">
				@if($error == null)
					<h3 class="text-white font-weight-light">
						Scan QR Code di meja anda untuk memesan
					</h3>
				@else
					<h3 class="text-danger font-weight-light">
						{{$error}}
					</h3>
				@endif
			</div>
		</div>
	</div> 

	<form class="d-none" action="checkTable" method="POST" id="form">
		<input type="hidden" id="token" name="token" value=""/>
	</form>

	<script type="text/javascript">
		function camera() {
			let scanner = new Instascan.Scanner({ 
				video: document.getElementById('preview'),
				mirror: false,
			});

			scanner.addListener('scan', function (content) {
				console.log(content);
				postData(content)
			});

			Instascan.Camera.getCameras().then(function (cameras) {
				if (cameras.length > 0) {
					if (cameras.length == 1) {
						scanner.start(cameras[0]);
					} else {
						scanner.start(cameras[1]);
					}
					// scanner.start(cameras[0]);
				} else {
					console.error('No cameras found.');
					alert('error');
				}
			}).catch(function (e) {
				console.error(e);
				alert(e);
			});

			function postData(token) {
				document.getElementById("token").value = token;
				document.getElementById("form").submit();
			}
		}
    </script>
  </body>
</html>