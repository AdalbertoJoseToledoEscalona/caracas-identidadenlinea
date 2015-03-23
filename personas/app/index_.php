<?php session_start();

if($_SESSION['alert'] != "")
	print "<script>alert('Registro Exitoso');</script>";

unset($_SESSION['alert']);
?>
<!DOCTYPE html> 
<html> 
<head> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="stylesheet" type="text/css" href="../librerias/css/identidad.css">
	
	<title>Identidad en Línea</title> 
</head> 

<body>

	<div class="caont-all">
		<!-- HEADER -->
		<?php include('../librerias/include/header-admin.php'); ?>

		<section class="contenedor-carga">

			<!-- <h2>Carga de archivos</h2> -->

			<div class="linea-pasos">
			</div>

			<form class="carga-doc" action="../controlador/registro_controller.php" method="post"  id="form_registro" name="form_registro" enctype="multipart/form-data">
				<div>
					<img src="../librerias/img/icon-cedula.jpg">
					<input type="file" name="cedula" />
					<input type="hidden" name="acc" id="acc" value="N" />
				</div>
					<div>
					<img src="../librerias/img/icon-rif.jpg">
					<input type="file" name="rif">
				</div>
				
				<div>
					<img src="../librerias/img/icon-nacimiento.jpg">
					<input type="file" name="nac">
				</div>
					<div>
					<img src="../librerias/img/icon-servicios.jpg">
					<input type="file" name="servicio">
					<input type="text" name="servicios" placeholder="Ingrese el tipo de documento">
				</div>
				
				<div>
					<img src="../librerias/img/icon-pasaporte.jpg">
					<input type="file" name="pas">
				</div>
				
				<div>
					<img src="../librerias/img/icon-otro.jpg">
					<input type="file" name="otro">
					<input type="text" name="otros" placeholder="Ingrese el tipo de documento">
				</div>

				<br>

				<button><span class="icon-floppy-disk"></span>Guardar</button>
			</form>
			<!-- <h4>Buscar cliente</h4> -->

			<!-- <form class="form-ingreso" action="" method="post" name="form">
			<input style="font-size:17px;padding:15px;text-align:center;" type="text" name="buscar" id="buscar" placeholder="Ingrese cualquier dato del cliente: Cédula de identidad, nombre o teléfono">
			<br>
			<button type="submit"><span class="icon-search"></span>Continuar</button>
			<button><span class="icon-user-plus"><a href="registro_cliente.php"></span>Registrar nuevo cliente</a></button>
			</form> -->
		</section>
	</div>

</body>
</html>
