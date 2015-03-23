/**
 * 
 */

function isOculto(campo) {
	var oculto = false;
	if (campo.style.visibility == "hidden") {
		oculto = true;
	} else {
		var padre = campo.parentNode;
		if (padre != null && padre.style != undefined) {
			oculto = isOculto(padre);
		}
	}

	return oculto;
}

function mostrarMensaje(mensaje, isError) {
	str_error = mensaje;
	var obj_error = document.getElementById("error");
	if(obj_error == null){
		if(mensaje.trim() != "")
			alert(str_error);
	}else{
		if (isError) {
			obj_error.className = "error";
		} else {
			obj_error.className = "exito";
		}
		obj_error.innerHTML = str_error;
		obj_error.style.visibility = "visible";
		obj_error.style.backgroundColor = "";
		obj_error.style.color = "";
	}
}

function reemplazarPisosPorEspacios(texto) {
	do {
		texto = texto.replace("_", " ");
	} while (texto != texto.replace("_", " "));

	return texto;
}

function soloNumeros(e) {
	var ch;
	if (e.which == null)
		ch = e.keyCode; // IE
	else if (e.which != 0 && e.charCode != 0)
		ch = e.which; // All others
	else
		return true;

	if (ch == 8
			|| (String.fromCharCode(ch) >= 0 && String.fromCharCode(ch) <= 9)) {
		return true;
	}
	return false;
}

function soloNumerosConDecimales(e) {
	var ch;
	if (e.which == null)
		ch = e.keyCode; // IE
	else if (e.which != 0 && e.charCode != 0)
		ch = e.which; // All others
	else
		return true;

	if (ch == 8
			|| (String.fromCharCode(ch) >= 0 && String.fromCharCode(ch) <= 9)
			|| String.fromCharCode(ch) == '.') {
		if (String.fromCharCode(ch) == '.') {
			if (e.target.value.indexOf(".") == -1) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}
	}
	return false;
}

// + Jonas Raoni Soares Silva
// @ http://jsfromhell.com/string/capitalize [rev. #1]
String.prototype.capitalize = function() {
	return this.replace(/\w+/g, function(a) {
		return a.charAt(0).toUpperCase() + a.slice(1);
	});
};