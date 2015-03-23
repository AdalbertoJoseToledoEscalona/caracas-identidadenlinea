<?php 
$error=$_REQUEST["error"];

if($error=="1")
{
	$errore='display:block;';
	$errores='display:none;';
	$errorese='display:none;';
}
else if($error=="2")
{
	$errores='display:block;';
	$errore='display:none;';
	$errorese='display:none;';
}
else if($error=="3")
{
	$errorese='display:block;';
	$errore='display:none;';
	$errores='display:none;';
}
else
{
	$errore='display:none;';
	$errores='display:none;';
	$errorese='display:none;';
}

?>
<!DOCTYPE html>
<html lang=es-ES>
<head>
	<!-- META -->
	<meta charset="utf-8">

	<!-- LINK -->
	<link rel="stylesheet" type="text/css" href="../librerias/css/identidad.css">

	<script src="../librerias/js/jq2.0.3.js"></script>
	<script src='../librerias/js/validar_session.js'></script>	
	<title>Carga de archivos</title>
 <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6LcyfgMTAAAAAJRUBj25mCTty2FLqM2vv22N5Zy4'
        });
      };
    </script>     
</head>
<body>
	<div class="cont-all">
		<section class="inicial" style="height: 690px;">
			<header>
				<div class="logo">Logo</div>
				<nav>
					<ul>
						<li><a href="../index.php">Inicio</a></li>
					</ul>
				</nav>
			</header>

			<form class="login" action="../controlador/usuario_controller.php?acc=N" style="top: 50px;" method="post" name="form_regitro" id="form_regitro" onsubmit="return validar_registro()">
				<h3 class="color-white">Regístro</h3>
				<br>

				<label for="ci">Cédula de identidad</label>
				<select id="nac" name="nac" style="margin-right: 1px;">
					<option value="">--</option>
					<option value="V">V</option>
					<option value="E">E</option>
					<option value="P">P</option>
					<option value="R">R</option>
				</select>
				<input type="text" name="ci" id="ci" style="width: 50%;" placeholder="Ejemplo : 12345678" onkeydown="return validarNumeros(event)">

				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" style="width: 60%;"  placeholder="Ejemplo : Maria Josefina" onkeydown="return validarLetras(event)">

				<label for="apellido">Apellido</label>
				<input type="text" name="apellido" id="apellido" style="width: 60%;" placeholder="Ejemplo : Perez Mijares" onkeydown="return validarLetras(event)">

				<label for="pass">Contraseña</label>
				<input type="password" name="pass" id="pass" style="width: 60%;"> 
				
				<label for="pass">Confimar Contraseña</label>
				<input type="password" name="conPass" id="conPass" style="width: 60%;">

				<label for="cel">Celular</label>
				<input type="text" name="cel" id="cel" style="width: 60%;" placeholder="Ejemplo : 02121234567" onkeydown="return validarNumeros(event)">

				<label for="email">Email</label>
				<input type="text" name="email" id="email" style="width: 60%;" placeholder="Ejemplo : ejemplo@ejemplo.com">

				<br>
				<!-- MENSAJE MARCO ROJO -->
				<div class="mensaje-registro" style='<?php print $errore;?>' id='mensaje_validacion' >
					<img src='../librerias/img/alert.png' height=20px; > 
					<strong>DEBE INGRESAR LOS DATOS MARCADOS EN ROJO</strong>
				</div>

				<div class="mensaje-registro" style='<?php print $errores;?>' id='mensaje_validacion2' >
					<img src='../librerias/img/alert.png' height=20px; > 
					<strong>El correo electrónico introducido no es correcto</strong>
				</div>

			<div class="mensaje-registro" style='<?php print $errorese;?>' id='mensaje_validacion3' >
				<img src='../librerias/img/alert.png' height=20px; > 
				<strong>Las contraseñas son distintas</strong>
			</div>
                                <div style="width: 100%; align='center'" align="center">
                                <div id="html_element"></div>
                                </div>           
				<button type="submit"><span class="icon-user-plus"></span>Regístrame</button>
			</form>
                        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
		</section>
	</div>  
    
</body>
</html>