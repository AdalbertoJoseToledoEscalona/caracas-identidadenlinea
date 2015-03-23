/**
 * 
 */

function validarFormulario(f) {
	var error = false;
	var str_error = "";
	for ( var i = 0; i < f.length; i++) {
		if (!isOculto(f[i]) && f[i].name.indexOf("norequerido") < 0) {
			if ((f[i].type.toLowerCase() == "text"
					|| f[i].type.toLowerCase() == "password"
					|| f[i].type.toLowerCase() == "file" || f[i].type
					.toLowerCase() == "textarea"|| f[i].type
					.toLowerCase() == "date" || f[i].type
					.toLowerCase() == "number"|| f[i].type
					.toLowerCase() == "email")
					&& (f[i].value == "" || f[i].value == null)) {
				if (!error) {
					f[i].focus();
				}
				error = true;
				/* str_error += "<li>el campo <b>"
						+ reemplazarPisosPorEspacios(f[i].name)
								.capitalize() + "</b> es requerido</li>"; */
				str_error += "<li>" + el_campo + " <b>"
					+ reemplazarPisosPorEspacios(f[i].name)
							.capitalize() + "</b> " + es_requerido + "</li>";
			} else if (f[i].tagName.toLowerCase() == "select") {
				if((f[i].multiple && f[i].selectedIndex < 0) || (!f[i].multiple && f[i].options[f[i].selectedIndex].value == "")){
					if (!error) {
						f[i].focus();
					}
					error = true;
					str_error += "<LI>" + el_campo + " <B>"
							+ reemplazarPisosPorEspacios(f[i].name)
									.capitalize() + "</B> " + es_requerido + "</LI>";
				}
			} else if (f[i].tagName.toLowerCase() == "textarea"
					&& (((f[i].value == "" || f[i].value == null)
							&& (f[i].innerHTML == "" || f[i].innerHTML == null)))) {
				if (!error) {
					f[i].focus();
				}
				error = true;
				str_error += "<LI>" + el_campo + " <B>"
						+ reemplazarPisosPorEspacios(f[i].name)
								.capitalize() + "</B> " + es_requerido + "</LI>";
			} else if (f[i].name.indexOf("email") != -1
					&& !chequearEmail(f[i])) {
				if (!error) {
					f[i].focus();
				}
				error = true;
				/* str_error += "<LI>Por favor ingrese una dirección de correo válida en el campo <B>"
						+ reemplazarPisosPorEspacios(f[i].name)
								.capitalize() + "</B></LI>"; */
				str_error += "<LI>" + mensaje_email_invalido + " <B>"
					+ reemplazarPisosPorEspacios(f[i].name)
							.capitalize() + "</B></LI>"; 
			}
		}
	}

	if (error) {
		/* str_error = "El formulario presenta los siguientes problemas:<UL>"
				+ str_error + "</UL>"; */
		str_error = titulo_errores_formulario + ":<UL>" + str_error + "</UL>";
		mostrarMensaje(str_error, true);
	}

	return !error;
}

function validarImagen(campo) {
	//Si el segundo argumento de la función contiene algo lo tenemos.
	//De lo contrario extensiones es un arreglo de las extensiones de imagenes por defecto.
	var extensiones = arguments[1] || new Array("jpg", "jpeg", "png", "gif");
	
	var partes = campo.value.split(".");
	
	partes = partes[partes.length - 1].toLowerCase();
	
	var strExtensiones = "";
	var error = true;
	if(extensiones instanceof Array){
		for ( var i = 0; i < extensiones.length; i++) {
			if(partes == extensiones[i]){
				error = false;
				break;
			}
		}
		
		if(error){
			strExtensiones = extensiones.join(", ");
		}
	}else{
		if(partes == extensiones){
			error = false;
		}else{
			strExtensiones = extensiones;
		}
	}
	
	if (error) {
		/*str_error = "Error: el formato de la imagen del campo "
				+ reemplazarPisosPorEspacios(campo.name).capitalize()
				+ "puede ser uno de los siguientes: jpg, jpeg, png, gif";*/
		str_error = error_validar_imagen_parte1 + " <b>"
				+ reemplazarPisosPorEspacios(campo.name.split("_norequerido")[0]).capitalize()
				+ "</b> " + error_validar_archivo_parte2 + " " + strExtensiones;	
		mostrarMensaje(str_error, true);
		campo.focus();
		return false;
	} else {
		return true;
	}
}

function validarVideo(campo) {
	//Si el segundo argumento de la función contiene algo lo tenemos.
	//De lo contrario extensiones es un arreglo de las extensiones de video por defecto.
	var extensiones = arguments[1] || new Array("mpg", "mpeg", "avi", "qt", "mov"); //AVI, MPEG, QUICKTIME";
	
	var partes = campo.value.split(".");
	
	partes = partes[partes.length - 1].toLowerCase();
	
	var strExtensiones = "";
	var error = true;
	if(extensiones instanceof Array){
		for ( var i = 0; i < extensiones.length; i++) {
			if(partes == extensiones[i]){
				error = false;
				break;
			}
		}
		
		if(error){
			strExtensiones = extensiones.join(", ");
		}
	}else{
		if(partes == extensiones){
			error = false;
		}else{
			strExtensiones = extensiones;
		}
	}
	
	if (error) {
		/*str_error = "Error: el formato del video del campo "
				+ reemplazarPisosPorEspacios(campo.name).capitalize()
				+ "puede ser uno de los siguientes: mpg, mpeg, avi, qt, mov";*/
		str_error = error_validar_video_parte1 + " <b>"
				+ reemplazarPisosPorEspacios(campo.name.split("_norequerido")[0]).capitalize()
				+ "</b> " + error_validar_archivo_parte2 + " " + strExtensiones;	
		mostrarMensaje(str_error, true);
		campo.focus();
		return false;
	} else {
		return true;
	}
}

function validarArchivo(campo, extensiones) {
	var partes = campo.value.split(".");
	
	partes = partes[partes.length - 1].toLowerCase();
	
	var strExtensiones = "";
	var error = true;
	if(extensiones instanceof Array){
		for ( var i = 0; i < extensiones.length; i++) {
			if(partes == extensiones[i]){
				error = false;
				break;
			}
		}
		
		if(error){
			strExtensiones = extensiones.join(", ");
		}
	}else{
		if(partes == extensiones){
			error = false;
		}else{
			strExtensiones = extensiones;
		}
	}
	
	if (error) {
		/*str_error = "Error: el formato del campo "
				+ reemplazarPisosPorEspacios(campo.name).capitalize()
				+ "puede ser uno de los siguientes: mpg, mpeg, avi, qt, mov";*/
		str_error = error_validar_archivo_parte1 + " <b>"
				+ reemplazarPisosPorEspacios(campo.name.split("_norequerido")[0]).capitalize()
				+ "</b> " + error_validar_archivo_parte2 + " " + strExtensiones;	
		mostrarMensaje(str_error, true);
		campo.focus();
		return false;
	} else {
		return true;
	}
}

function chequearEmail(email) {
	// txt=document.f.email.value;
	txt = email.value;
	a2 = txt.indexOf("@");
	len = txt.length;
	if (a2 < 3) {
		// alert("Por favor ingrese una direcci�n de correo v�lida");
		// document.f.email.focus();
		return false;
	}
	a3 = txt.lastIndexOf(".");
	chequear_ult = len - a3;
	if (chequear_ult < 3) {
		// alert("Por favor ingrese una direcci�n de correo v�lida");
		// document.f.email.focus();
		return false;
	}
	punto = txt.indexOf(".", a2);
	len1 = punto - a2;
	if (len1 < 1) {
		// alert("Por favor ingrese una direcci�n de correo v�lida");
		// document.f.email.focus();
		return false;
	} else {
		return true;
	}
}

function soloNumeros(e){
	var ch;
	if (e.which == null)
		ch= e.keyCode;    // IE
	else if (e.which != 0 && e.charCode != 0) 
		ch= e.which;	  // All others
	else
		return true;
		
	if(ch == 8 || (String.fromCharCode(ch) >= 0 && String.fromCharCode(ch) <= 9)){
		return true;
	}
	 return false;
}