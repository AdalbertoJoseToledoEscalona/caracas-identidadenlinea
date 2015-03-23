<?php 
session_start();
$error=$_SESSION["error"];
$exito=$_SESSION["exito"];

if($error=="1")
{
	$errore='display:block;';
	$errores='display:none;';
	$error='display:none;';
}
else if($error=="2")
{
	$errores='display:block;';
	$error='display:none;';
	$errore='display:none;';
}
else if($error=="3")
{
	$error='display:block;';
	$errore='display:none;';
	$errores='display:none;';
}
else
{
	$error='display:none;';
	$errore='display:none;';
	$errores='display:none;';
}

if($exito !="")
	$exito='display:block;';
else
	$exito='display:none;';

unset($_SESSION["error"]);
unset($_SESSION["exito"]);
?>
<!DOCTYPE html>
<html lang=es-ES>
<head>
	<!-- META -->
	<meta charset="utf-8">
	<!-- LINK -->
	<link rel="stylesheet" type="text/css" href="librerias/css/identidad.css">
	<script src="librerias/js/jq2.0.3.js"></script>
        <script src='librerias/js/validar_session.js'></script>
	<title>ingreso</title>
</head>
<body>
	<div>
		<!-- HEADER -->
		<section class="inicial">
			<form class="login-empre" action="controller/usuario_controller.php?acc=LOGIN" method="post" name="form_login" id="form_login" onsubmit="return validar_session()">
			        <div class="mensaje-registro" style='<?php print $exito;?> border:0px;'  id='mensaje_validacion3' >
					<img src='librerias/img/alert.png' height=20px; > 
					<strong>Registro Exitoso, ya puede Iniciar Sesi&oacute;n</strong>
				</div>
				<div class="mensaje-registro" style='<?php print $error;?> border:0px;' id='mensaje_validacion3' >
					<img src='librerias/img/alert.png' height=20px; > 
					<strong>Datos incorrectos</strong>
				</div>
                            <h3>Login</h3>

				<input type="text" name="user" id="user" style="width: 60%;" placeholder="Ingrese su correo">

				<input type="password" name="pass" id="pass" style="width: 60%;" placeholder="Ingrese su contraseña">
                               
                                <input type="submit" value="Ingresar">
                                <div class="mensaje-registro" style='<?php print $errore;?> border:0px;'  id='mensaje_validacion' >
					<img src='librerias/img/alert.png' height=20px; > 
					<strong>DEBE INGRESAR LOS DATOS MARCADOS EN ROJO</strong>
                                </div>
				<div class="mensaje-registro" style='<?php print $errores;?> border:0px;' id='mensaje_validacion2' >
					<img src='librerias/img/alert.png' height=20px; > 
					<strong>El correo electrónico introducido no es correcto</strong>
				</div>
			</form>
                    
                    </section>    
        </div>
</body>
</html>