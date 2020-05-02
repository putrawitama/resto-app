<!DOCTYPE html>
<html>
  <head>
  	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ base_url() }}assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ base_url() }}assets/css/costum.css">
    <title>Resto Bumi</title>
    <script type="text/javascript" src="{{ base_url() }}assets/js/jsQR.js"></script>
	<style>
	#canvas {
      width: 100%;
    }
	</style>
  </head>
  <body>

	<div class="overflow-hidden text-center">
		<video id="preview" class="h-100 w-auto mx-auto"></video>
		<canvas id="canvas" class="h-100 w-auto mx-auto" hidden></canvas>
	</div>
	<div class="container position-absolute top-scanner">
		<div class="row justify-content-center my-5">
			<div class="col-md-4 text-center">
				@if($error == null)
					<h3 class="text-white font-weight-light">
					Scan the QR Code on your table to order
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
	var video = document.getElementById("preview");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
	var isLoading = false;

    function drawLine(begin, end, color) {
      canvas.beginPath();
      canvas.moveTo(begin.x, begin.y);
      canvas.lineTo(end.x, end.y);
      canvas.lineWidth = 4;
      canvas.strokeStyle = color;
      canvas.stroke();
    }

    // Use facingMode: environment to attemt to get the front camera on phones
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
      video.srcObject = stream;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.play();
      requestAnimationFrame(tick);
    });

    function tick() {
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        canvasElement.hidden = false;

        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
        });
        if (code && !isLoading) {
          drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
          drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
          drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
          drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
		  postData(code.data);
		// console.log(code.data);
		isLoading = true;
        }
      }
      requestAnimationFrame(tick);
    }
	function postData(token) {
		document.getElementById("token").value = token;
		document.getElementById("form").submit();
	}
    </script>
  </body>
</html>