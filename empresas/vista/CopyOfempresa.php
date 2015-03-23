<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="../librerias/js/validaciones_param.js"></script>
<script type="text/javascript" src="../librerias/js/validaciones.js"></script>
<script type="text/javascript" src="../librerias/js/utils.js"></script>
<script type="text/javascript" src="../librerias/js/reportes.js"></script>

<script type="text/javascript" src="../librerias/js/empresa.js"></script>

<script type="text/javascript" src="../librerias/js/ajax_empresas.js"></script>
<script type="text/javascript" src="../librerias/js/ajax_recargar_tabla_archivos.js"></script>
<script type="text/javascript" src="../librerias/js/ajax_solicitar_descargar_archivo.js"></script>
<script type="text/javascript" src="../librerias/js/ajax_enter_code.js"></script>
</head>
    <center>
    	<form onsubmit="buscarPersonas(this); return false;" action="?" method="get">
    	<div id="error"></div>
    	Search a Person:
    	<select name="identity_prefix">
    		<option value="V">Venezuelan</option>
    		<option value="E">Foreing</option>
    		<option value="P">Passport</option>
    	</select> 
    	<input type="text" name="identity_number" onkeypress="return soloNumeros(event);">
    	<input type="submit" value="Search Person"">
    	</form>
    	<div id="files"></div>
    </center>
</html>