// Cambia estos parametros
//var seconds = 10; // el tiempo en que se refresca
var dividSolicitar= "files"; // el div que quieres!
var urlSolicitar = "ajax_solicitud_descarga.php"; // el archivo que ira en el div
//var secondsClima = 1800;
/*var secondsCartelera = 3600;*/
//var secondsMarquee = 3600;
//var secondsLogo = 2;
////////////////////////////////
//
// Refreshing the DIV
//
////////////////////////////////
function ajaxSolicitarDescargar(param){
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

var nocacheurl = urlSolicitar+"?t="+timestamp+qs;
//alert(nocacheurl);
// The code...
xmlHttp.onreadystatechange=function(){
if(xmlHttp.readyState==4){
	//echo "hecho";
	//var loquevienedejsp = xmlHttp.responseText; //OBTENGO LO QUE IMPRIMIO MI JSP
	var respuesta = xmlHttp.responseText.replace("/^\s*|\s*$\g","");
	
	var obj_error = document.getElementById(dividSolicitar);
	
	
	if(respuesta.indexOf("error=") != -1){
		
		str_error = respuesta.split("error=")[1].split("<fin_error>")[0];
		//str_error = respuesta +"error";
		obj_error.innerHTML = str_error;
		obj_error.className = "error";
		obj_error.style.visibility = "visible";
	}else if(respuesta.indexOf("<inicio_code>") != -1){
		
		//document.getElementById(dividSolicitar).innerHTML = respuesta;
		var code = respuesta.split("<inicio_code>")[1].split("<fin_code>")[0];
		var identityPrefix = respuesta.split("<identity_prefix>")[1].split("<fin_identity_prefix>")[0];
		var identityNumber = respuesta.split("<identity_number>")[1].split("<fin_identity_number>")[0];
		var userId = respuesta.split("<user_id>")[1].split("<fin_user_id>")[0];
		var cell_phone = respuesta.split("<cell_phone>")[1].split("<fin_cell_phone>")[0];
		var files = new Array();
		var count = 1;
		while(respuesta.indexOf("<file_" + count + ">") != -1){
			files[files.length] = respuesta.split("<file_" + count + ">")[1].split("<fin_file_" + count + ">")[0];
			count++;
		}
		
		/*alert("code = " + code);
		alert("identityPrefix = " + identityPrefix);
		alert("identityNumber = " + identityNumber);
		alert("userId = " + userId);
		for ( var i = 0; i < files.length; i++) {
			alert("files[" + i + "] = " + files[i]);
		}*/
		
		
		ajaxEnterCode(code, identityPrefix, userId, files, cell_phone);
	}
	

//setTimeout('refreshdiv()',seconds*1000);
}else{
	document.getElementById(dividSolicitar).innerHTML=cargando;
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