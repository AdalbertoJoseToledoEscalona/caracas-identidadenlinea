function buscarPersonas(f) {
	if (!validarFormulario(f)) {
		return false;
	} else {
		var param = "";
		for ( var i = 0; i < f.length; i++) {
			if (f[i].type.toLowerCase() == "text"
					|| f[i].type.toLowerCase() == "password"
					|| f[i].type.toLowerCase() == "file"
					|| f[i].type.toLowerCase() == "textarea"
					|| f[i].type.toLowerCase() == "date"
					|| f[i].type.toLowerCase() == "number"
					|| f[i].type.toLowerCase() == "email") {
				param += "&" + f[i].name + "=" + f[i].value;
			} else if (f[i].tagName.toLowerCase() == "select") {
				for ( var j = 0; j < f[i].options.length; j++) {
					if (f[i].options[j].selected) {
						param += "&" + f[i].name + "=" + f[i].options[j].value;
					}
				}
			} else if (f[i].tagName.toLowerCase() == "textarea") {
				param += "&" + f[i].name + "=" + f[i].innerHTML;
			}
		}
		
		mostrarMensaje("", false);
		ajaxBuscarUsuario(param);
	}
}

function solicitarDescargarArchivos(f) {

	var error = true;
	var param = "";
	for ( var i = 0; i < f.length; i++) {
		if (f[i].type.toLowerCase() == "text"
				|| f[i].type.toLowerCase() == "password"
				|| f[i].type.toLowerCase() == "file"
				|| f[i].type.toLowerCase() == "textarea"
				|| f[i].type.toLowerCase() == "date"
				|| f[i].type.toLowerCase() == "number"
				|| f[i].type.toLowerCase() == "email"
				|| f[i].type.toLowerCase() == "hidden") {
			param += "&" + f[i].name + "=" + f[i].value;
		} else if (f[i].type.toLowerCase() == "checkbox" && f[i].checked) {
			error = false;
			param += "&" + f[i].name + "=" + f[i].value;
		}

	}

	
	if (!error) {
		mostrarMensaje("", false);
		
		ajaxSolicitarDescargar(param);
	} else {
		f[0].focus();
		mostrarMensaje("You must check at least one file", true);
	}

}

function validarCodigo(f, $codigoGenerado) {
	if (!validarFormulario(f)) {
		return false;
	} else {
		if(f[0].value == $codigoGenerado){
			mostrarMensaje("", false);
			
			return true;
		}else{
			mostrarMensaje("Incorrect Code, please try again", true);
			return false;
		}
	}
}

function recargarTablaArchivos() {

	var objDivFiltros = document.getElementById("filtros");
	var campos = objDivFiltros.getElementsByTagName("select");
	
		var param = "";
		for ( var i = 0; i < campos.length; i++) {
			if (campos[i].type.toLowerCase() == "text"
					|| campos[i].type.toLowerCase() == "password"
					|| campos[i].type.toLowerCase() == "file"
					|| campos[i].type.toLowerCase() == "textarea"
					|| campos[i].type.toLowerCase() == "date"
					|| campos[i].type.toLowerCase() == "number"
					|| campos[i].type.toLowerCase() == "email"
						|| campos[i].type.toLowerCase() == "hidden") {
				param += "&" + campos[i].name + "=" + campos[i].value;
			} else if (campos[i].tagName.toLowerCase() == "select") {
				for ( var j = 0; j < campos[i].options.length; j++) {
					if (campos[i].options[j].selected) {
						param += "&" + campos[i].name + "=" + campos[i].options[j].value;
					}
				}
			} else if (campos[i].tagName.toLowerCase() == "textarea") {
				param += "&" + campos[i].name + "=" + campos[i].innerHTML;
			}
		}
		
		var campos = objDivFiltros.getElementsByTagName("input");

		for ( var i = 0; i < campos.length; i++) {
			if (campos[i].type.toLowerCase() == "text"
					|| campos[i].type.toLowerCase() == "password"
					|| campos[i].type.toLowerCase() == "file"
					|| campos[i].type.toLowerCase() == "textarea"
					|| campos[i].type.toLowerCase() == "date"
					|| campos[i].type.toLowerCase() == "number"
					|| campos[i].type.toLowerCase() == "email"
						|| campos[i].type.toLowerCase() == "hidden") {
				param += "&" + campos[i].name + "=" + campos[i].value;
			} else if (campos[i].tagName.toLowerCase() == "select") {
				for ( var j = 0; j < campos[i].options.length; j++) {
					if (campos[i].options[j].selected) {
						param += "&" + campos[i].name + "=" + campos[i].options[j].value;
					}
				}
			} else if (campos[i].tagName.toLowerCase() == "textarea") {
				param += "&" + campos[i].name + "=" + campos[i].innerHTML;
			}
		}
		
		mostrarMensaje("", false);
		ajaxRecargarTablaArchivos(param);
}