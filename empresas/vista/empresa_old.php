<!DOCTYPE html> 
<html> 
<head> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/identidad.css">
	<link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/errores.css">
	<link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/identidad.css">
	<link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/identidad.css">
	
	<title>Identidad Digital</title> 
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

<body>

	<div class="caont-all">
		<!-- HEADER -->
		<?php include('../libreriasEmpresa/include/header-admin.php'); ?>

		<section class="contenedor-carga">

			<div class="linea-pasos">
			</div>

			<section class="buscar">
				<!-- BÚDQUEDA CON LA CI -->
				<div id="error" class="error"></div>
				<form class="carga-doc" onsubmit="buscarPersonas(this); return false;" action="?" method="get" style="width: 50%;">
					<select name="identity_prefix" >
			    		<option value="V">V</option>
			    		<option value="E">E</option>
			    		<option value="P">P</option>
			    		<option value="P">R</option>
			    	</select>
					<input class="campo-buscar" type="text" name="identity_number" placeholder="Ingrese la cédula de identidad" onkeypress="return soloNumeros(event);">
					<button><span class="icon-search"></span><input type="submit" style="background: none;color: white;"></button>
				</form>
				<center><div id="files" class="mensaje-registro" style="width: 1000px;"></div></center>
			</section>
		</section>
	</div>

</body>
</html>