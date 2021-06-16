<!-- HTML -->
<div class="row justify-content-center" >
	<canvas id="canvas" crossorigin></canvas> 
</div>
<div class="row justify-content-center" >
	<button onclick="confirmSign()" type="button" class="btn btn-primary">Valider</button>
</div>


<!--script-->
<script>
	
	const canvas = document.getElementById("canvas");
	const ctx = canvas.getContext("2d");
	let coord = { x: 0, y: 0 };

	document.addEventListener("mousedown", start);
	document.addEventListener("mouseup", stop);
	window.addEventListener("resize", resize);
	
	//Draw the background who be our url
	getMeta("Url")
	var background = new Image();
	background.src = "Url";

	background.onload = function(){
		ctx.drawImage(background,0,0);   
	}
	
	// for the canvas be the same size of url img we do this
	function getMeta(url){  
		var img = new Image();
		img.onload =  function() {
			resize(this.height,this.width)
		};
		img.src = url;
	}
	
	function resize(height,width) {
	ctx.canvas.width = width;
	ctx.canvas.height = height;
	}

	function reposition(event) {
	coord.x = event.pageX - canvas.offsetLeft;
	coord.y = event.pageY - canvas.offsetTop;
	}

	function start(event) {
		
	document.addEventListener("mousemove", draw);
	reposition(event);
	}

	function stop() {
	document.removeEventListener("mousemove", draw);
	}
	
	function draw(event) {
	ctx.beginPath();
	ctx.lineWidth = 3;
	ctx.lineCap = "round";
	ctx.strokeStyle = "black";
	ctx.moveTo(coord.x, coord.y);
	reposition(event);
	ctx.lineTo(coord.x, coord.y);
	ctx.stroke();
	}

	function confirmSign() {
		let data = canvas.toDataURL('image/png');
		console.log(data);
	}

</script>

<style>
* {
	cursor:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'  width='40' height='48' viewport='0 0 100 100' style='fill:black;font-size:24px;'><text y='50%'>✍️</text></svg>") 16 0,auto;
}
canvas {
	background-repeat: no-repeat;
	background-position: center;
	margin-top: 5%;
}
</style>
