<html>
<head>
	<script src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
function carga()
{
	posicion=0; elMovimiento=null;

	// IE
	if(navigator.userAgent.indexOf("MSIE")>=0 || navigator.userAgent.indexOf("Trident")>=0) navegador=0;
	// Otros
	else
		navegador=1;
}

function evitaEventos(event)
{
	// Funcion que evita que se ejecuten eventos adicionales
	if(navegador==0)
	{
		window.event.cancelBubble=true;
		window.event.returnValue=false;
	}
	if(navegador==1) event.preventDefault();
}

function comienzoMovimiento(event, id)
{
	elMovimiento=document.getElementById(id);
	if(navegador==0)
	 {
	 	cursorComienzoX=window.event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft;
		cursorComienzoY=window.event.clientY+document.documentElement.scrollTop+document.body.scrollTop;

		document.attachEvent("onmousemove", enMovimiento);
		document.attachEvent("onmouseup", finMovimiento);
	}
	if(navegador==1)
	{
		cursorComienzoX=event.clientX+window.scrollX;
		cursorComienzoY=event.clientY+window.scrollY;
		document.addEventListener("mousemove", enMovimiento, true);
		document.addEventListener("mouseup", finMovimiento, true);
	}

	elComienzoX=parseInt(elMovimiento.style.left);
	elComienzoY=parseInt(elMovimiento.style.top);
	// Actualizo el posicion del elemento
	elMovimiento.style.zIndex=++posicion;
	evitaEventos(event);
}

function enMovimiento(event)
{
	var xActual, yActual;
	if(navegador==0)
	{
		xActual=window.event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft;
		yActual=window.event.clientY+document.documentElement.scrollTop+document.body.scrollTop;
	}
	if(navegador==1)
	{
		xActual=event.clientX+window.scrollX;
		yActual=event.clientY+window.scrollY;
	}

	elMovimiento.style.left=(elComienzoX+xActual-cursorComienzoX)+"px";
	elMovimiento.style.top=(elComienzoY+yActual-cursorComienzoY)+"px";
	evitaEventos(event);
}

function finMovimiento(event)
{
	if(navegador==0)
	{
		document.detachEvent("onmousemove", enMovimiento);
		document.detachEvent("onmouseup", finMovimiento);
	}
	if(navegador==1)
	{
		document.removeEventListener("mousemove", enMovimiento, true);
		document.removeEventListener("mouseup", finMovimiento, true);
	}
}
</script>
</head>
<body onLoad="carga();">

<?php
$posicion=300;
for ($h=1; $h<6 ; $h++) {
	//Las cartas estan numeradas del 1-13+"c,d,p,t"
	$aleatorio = rand(1, 13);

	//Defino una cadena con los caracteres utilizados para extraer uno aleatoriamente
	$cadena="CDPT";
	$numeC=strlen($cadena);
	$aleatorio.=$cadena[rand()%$numeC];//Adjunto al numero generado con el caracter extraido

	echo '
				<div id="div'.$h.'" style="top:200px; left:'.$posicion.'px; width:112px; height:158px; position:absolute; background-color:black;"
				onmousedown="comienzoMovimiento(event, this.id);" onMouseOver="this.style.cursor= \' move \' ">
				<img hidden class="tapa" src="baraja/tapa.jpg"/>
				<img class="baraja" src="baraja/'.$aleatorio.'.jpg" />
				<input name="Voltear" id="voltear" type="button" value="Voltear">
				<input name="Ocultar" id="ocultar" type="button" value="Ocultar">
				<input name="Mostrar" id="mostrar" type="button" value="Mostrar">
				</div>
			';
 $posicion +=200;//desplaza el div 200px mas a la izq. cada vez
}
?>
<script>
var num1=num2=num3=num4=num5=0;
//Carta Poker #1
	$("#div1 #voltear").click(function(){
		if(num1==0){
			$("#div1 .baraja").hide();
			$("#div1 .tapa").show();
			num1=1;}
	  else {
			$("#div1 .tapa").hide();
			$("#div1 .baraja").show();
			num1=0;
	  }
	});
	$("#div1 #ocultar").click(function(){
		$("#div1 img").hide();
	});
	$("#div1 #mostrar").click(function(){
		if (num1==0) {
			$("#div1 .baraja").show();
		} else{
		$("#div1 .tapa").show();}
	});

//Carta Poker #2
	$("#div2 #voltear").click(function(){
		if(num2==0){
			$("#div2 .baraja").hide();
			$("#div2 .tapa").show();
			num2=1;}
	  else {
			$("#div2 .tapa").hide();
			$("#div2 .baraja").show();
			num2=0;
	  }
	});
	$("#div2 #ocultar").click(function(){
		$("#div2 img").hide();
	});
	$("#div2 #mostrar").click(function(){
		if (num2==0) {
			$("#div2 .baraja").show();
		} else{
		$("#div2 .tapa").show();}
	});

//Carta Poker #3
	$("#div3 #voltear").click(function(){
		if(num3==0){
			$("#div3 .baraja").hide();
			$("#div3 .tapa").show();
			num3=1;}
	  else {
			$("#div3 .tapa").hide();
			$("#div3 .baraja").show();
			num3=0;
	  }
	});
	$("#div3 #ocultar").click(function(){
		$("#div3 img").hide();
	});
	$("#div3 #mostrar").click(function(){
		if (num3==0) {
			$("#div3 .baraja").show();
		} else{
		$("#div3 .tapa").show();}
	});
//Carta Poker #4
	$("#div4 #voltear").click(function(){
		if(num4==0){
			$("#div4 .baraja").hide();
			$("#div4 .tapa").show();
			num4=1;}
	  else {
			$("#div4 .tapa").hide();
			$("#div4 .baraja").show();
			num4=0;
	  }
	});
	$("#div4 #ocultar").click(function(){
		$("#div4 img").hide();
	});
	$("#div4 #mostrar").click(function(){
		if (num4==0) {
			$("#div4 .baraja").show();
		} else{
		$("#div4 .tapa").show();}
	});

//Carta Poker #5
	$("#div5 #voltear").click(function(){
		if(num5==0){
			$("#div5 .baraja").hide();
			$("#div5 .tapa").show();
			num5=1;}
	  else {
			$("#div5 .tapa").hide();
			$("#div5 .baraja").show();
			num5=0;
	  }
	});
	$("#div5 #ocultar").click(function(){
		$("#div5 img").hide();
	});
	$("#div5 #mostrar").click(function(){
		if (num5==0) {
			$("#div5 .baraja").show();
		} else{
		$("#div5 .tapa").show();}
	});
</script>
</body>
</html>
