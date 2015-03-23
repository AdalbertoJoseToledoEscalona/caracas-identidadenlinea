// Cambia estos parametros
//var seconds = 10; // el tiempo en que se refresca
var dividRecargar= "tabla_archivos"; // el div que quieres!
var urlRecargar = "ajax_recargar_tabla_archivos.php"; // el archivo que ira en el div
//var secondsClima = 1800;
/*var secondsCartelera = 3600;*/
//var secondsMarquee = 3600;
//var secondsLogo = 2;
////////////////////////////////
//
// Refreshing the DIV
//
////////////////////////////////
function ajaxRecargarTablaArchivos(param){
// The XMLHttpRequest object
var xmlHttp;
try{
xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
}
catch (e){
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
}
catch (e){
try{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e){
alert("Tu explorador no soporta AJAX.");
return false;
}
}
}
// Timestamp for preventing IE caching the GET request
fetch_unix_timestamp = function()
{
return parseInt(new Date().getTime().toString().substring(0, 10));
};
var timestamp = fetch_unix_timestamp();
//var q = location.href.split("?");
//alert("Nombre Baner = " + nombre_banner);
var qs = param;
var nocacheurl = urlRecargar+"?t="+timestamp+qs;
//alert(nocacheurl);
// The code...
xmlHttp.onreadystatechange=function(){
if(xmlHttp.readyState==4){
	//echo "hecho";
	//var loquevienedejsp = xmlHttp.responseText; //OBTENGO LO QUE IMPRIMIO MI JSP
	var respuesta = xmlHttp.responseText.replace("/^\s*|\s*$\g","");

	var obj_error = document.getElementById(dividRecargar);
	
	if(respuesta.indexOf("error=") != -1){
		
		str_error = respuesta.split("error=")[1].split("<fin_error>")[0];
		//str_error = respuesta +"error";
		obj_error.innerHTML = str_error;
		obj_error.className = "error";
		obj_error.style.visibility = "visible";
	}else{
		document.getElementById(dividRecargar).innerHTML = respuesta;
		colocarPagina(1);
	}
	

//setTimeout('refreshdiv()',seconds*1000);
}else{
	document.getElementById(dividRecargar).innerHTML=cargando;
}
};
xmlHttp.open("GET",nocacheurl,true);
xmlHttp.send(null);
}
// Start the refreshing process
/*window.onload = function startrefresh(){
setTimeout('refreshdiv()',seconds*1000);
//setTimeout('refreshdivClima()',secondsClima*1000);
setTimeout('refreshdivCartelera()',secondsClima*1000);
setTimeout('refreshdivMarquee()',secondsMarquee*1000);
//setTimeout('refreshdivLogo()',secondsLogo*1000);
}*/