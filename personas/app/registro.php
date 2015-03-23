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
	<title>Registro</title>
</head>
<body>
	<div>
		<section class="inicial" style="height: 690px;">
			<form class="reg-empre" action="controller/usuario_controller.php?acc=N" style="top: 50px;" method="post" name="form_regitro" id="form_regitro" onsubmit="return validar_registro()">
                            <h3>Registro</h3>
                            <p>Llene todos los campos para completar su registro</p>

				<select id="nac" name="nac" style="margin-right: 1px;">
					<option value="">--</option>
					<option value="V">V</option>
					<option value="E">E</option>
					<option value="P">P</option>
					<option value="R">R</option>
				</select>
				<input type="text" name="ci_reg" id="ci_reg" style="width: 50%;" placeholder="Ejemplo : 12345678" onkeydown="return validarNumeros(event)">

				<input type="text" name="nombre" id="nombre" style="width: 60%;"  placeholder="Nombre" onkeydown="return validarLetras(event)">

				<input type="text" name="apellido" id="apellido" style="width: 60%;" placeholder="Apellido" onkeydown="return validarLetras(event)">

				<input type="password" name="pass_r" id="pass_r" style="width: 60%;" placeholder="Contraseña"> 
				
				<input type="password" name="conPass_reg" id="conPass_reg" style="width: 60%;" placeholder="Confimar Contraseña">

				<input type="text" name="cel" id="cel" style="width: 60%;" placeholder="Celular" onkeydown="return validarNumeros(event)">

				<input type="text" name="email" id="email" style="width: 60%;" placeholder="Email">
                                
                                <div id="html_element" align="center"></div>
                                <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>   
                                
				<br>
				<!-- MENSAJE MARCO ROJO -->
				<div class="mensaje-registro" style='<?php print $errore;?>' id='mensaje_validacion_reg' >
					<img src='../librerias/img/alert.png' height=20px; > 
					<strong>DEBE INGRESAR LOS DATOS MARCADOS EN ROJO</strong>
				</div>

				<div class="mensaje-registro" style='<?php print $errores;?>' id='mensaje_validacion2_reg' >
					<img src='../librerias/img/alert.png' height=20px; > 
					<strong>El correo electrónico introducido no es correcto</strong>
				</div>

			<div class="mensaje-registro" style='<?php print $errorese;?>' id='mensaje_validacion3_reg' >
				<img src='../librerias/img/alert.png' height=20px; > 
				<strong>Las contraseñas son distintas</strong>
			</div>
                                <div style="width: 100%;" align="center">
                                <div id="html_element"></div>
                                </div>           
				<input type="submit" value="Registrarse">
			</form>
		</section>
	</div>  
    
</body>
</html>