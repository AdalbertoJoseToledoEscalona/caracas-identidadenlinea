<?php session_start();
       
if ($_SESSION["nombre_empresa"]==''){
    session_destroy(); 
    echo '<SCRIPT>window.location.href="../index.php"</SCRIPT>';
}

?>

<!DOCTYPE html> 
<html lang="es-ES"> 
<head> 
	<!-- METAS -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1">  -->
	<!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> -->
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- LINKS -->
	<link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/identidad.css">
	<link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/errores.css">
	<link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/formulario.css">
	<link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/reportes.css">
	
	<title>Identiad en línea - Companies</title> 
	<script type="text/javascript" src="../librerias/js/validaciones_param.js"></script>
	<script type="text/javascript" src="../librerias/js/validaciones.js"></script>
	<script type="text/javascript" src="../librerias/js/utils.js"></script>
	<script type="text/javascript" src="../librerias/js/reportes.js"></script>
	<script type="text/javascript" src="../librerias/js/reportes_div.js"></script>
	<script type="text/javascript" src="../librerias/js/cookie.js"></script>
	
	<script type="text/javascript" src="../librerias/js/empresa.js"></script>
	
	<script type="text/javascript" src="../librerias/js/ajax_empresas_usuarios.js"></script>
	<script type="text/javascript" src="../librerias/js/ajax_empresas.js"></script>
	<script type="text/javascript" src="../librerias/js/ajax_recargar_tabla_archivos.js"></script>
	<script type="text/javascript" src="../librerias/js/ajax_solicitar_descargar_archivo.js"></script>
	<script type="text/javascript" src="../librerias/js/ajax_enter_code.js"></script>

</head> 

<body>

	<div class="caont-all">
		<!-- HEADER -->
		<?php include('../libreriasEmpresa/include/header_empresas.php'); ?>

		<section class="cont-all">
			
			<!-- MENÚ VERTICAL -->
			<?php include('../libreriasEmpresa/include/vertical_empresas.php'); ?>
	
			<!-- CONTENIDO -->
			<?php include('../libreriasEmpresa/include/buscar-doc.php'); ?>
			<?php //include 'ajax_recargar_tabla_usuarios.php'; ?>		
			<!-- <div class="linea-pasos">
			</div>

			<section class="buscar">  -->
				<!-- BÚDQUEDA CON LA CI -->
				<!-- <div id="error" class="error"></div>
				<form class="carga-doc" onsubmit="buscarPersonas(this); return false;" action="?" method="get" style="width: 50%;">
					
					<input class="campo-buscar" type="text" name="search_text" placeholder="Search Text">
					<button><span class="icon-search"></span><input type="submit" style="background: none;color: white;"></button>
				</form>
				<center>
				<div id="files" class="mensaje-registro" style="width: 1000px;"> -->
					<?php //include 'ajax_recargar_tabla_usuarios.php'; ?>				
				<!-- </div></center>
			</section>  -->
		</section>
	</div>
	
	<script type="text/javascript">
		<?php if(isset($_GET["error"])) { ?>
			mostrarMensaje("<?=$_GET["error"]?>", true);
		<?php }else if(isset($_GET["exito"])) { ?>
			mostrarMensaje("<?=$_GET["exito"]?>", false);
		<?php } ?>


		var currentDate = new Date();
		var expires = new Date(currentDate.getFullYear() + 1, currentDate.getMonth(), currentDate.getDate(), currentDate.getHours(), 
				currentDate.getMinutes(), currentDate.getSeconds(), currentDate.getMilliseconds());
		var co2Cont = getCookie("co2_cont");
		var objCo2Cont = document.getElementById("co2_cont");
		var moneyCont = getCookie("moneyCont");
		var objMoneyCont = document.getElementById("money_cont");
		
		if(co2Cont == null || co2Cont.trim() == ""){
			setCookie("co2_cont", objCo2Cont.innerHTML.trim(), expires);
		}else{
			objCo2Cont.innerHTML = co2Cont.trim();
		}

		if(moneyCont == null || moneyCont.trim() == ""){
			setCookie("moneyCont", objMoneyCont.innerHTML.trim(), expires);
		}else{
			objMoneyCont.innerHTML = moneyCont.trim();
		}
	</script>

</body>
</html>