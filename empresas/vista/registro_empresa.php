<?php
/*if($_SESSION["exito_1"]=="1"){
}*/
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    	<!-- SCRIPTS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
        <script type="text/javascript" src="../libreriasEmpresa/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider();
                     
                 });
           
                var onloadCallback = function() {
                grecaptcha.render('html_element', {
                'sitekey' : '6LcyfgMTAAAAAJRUBj25mCTty2FLqM2vv22N5Zy4'
            });
         };

        </script>
        <script src='../libreriasEmpresa/js/validar_registro_empresa.js'></script>	
     <!-- METAS -->
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- LINKS -->
        <link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/identidad.css">
        <link rel="stylesheet" type="text/css" href="../libreriasEmpresa/css/inicio.css">

	<title>Identidad en línea Empresas</title>
</head>
<body>
	<section class="logo-id">
            <img src="../libreriasEmpresa/img/logo-id-empre.png">
	</section>

	<section class="log-reg">
	        <form class="login-empre" method="post"  name="form_login_empresa" id="form_login_empresa" action="../controlador/login_controller_empresa.php"  onsubmit="return validar_login_empresa()">    
			<h3>Login</h3>
                        <input type="text"  autocomplete="off"  name="txt_login" id="txt_login" onchange="validar_ingreso();" placeholder="Ingrese el rif de la empresa">
                        <input type="password"  autocomplete="off" name="txt_password" id="txt_password" onchange="validar_ingreso();" placeholder="Ingrese contraseña">

                        <div class="mensaje-form" id="div_mensaje">
                            <input type='hidden' name='validacion_login' id='validacion_login' value='0'>
                        </div>

                        <input type="submit" value="Ingresar" name="btn_ingresar" id="btn_ingresar">

		</form>

            <form class="reg-empre" action="../controlador/login_controller_empresa.php" method="post" name="form_reg_empresa" id="form_reg_empresa" onsubmit="return validar_reg_empresa();">
			<h3>Registro</h3>
			<p>Llene todos los campos para completar su registro</p>
                        <input type="text" autocomplete="off" name="rif" id="rif" placeholder="Ingrese el rif de la empresa" onchange="validar_id_empre()">
                        <input type="text" autocomplete="off"  name="name_empre" id="name_empre" placeholder="Ingrese el nombre de la empresa">
                        <input type="text" autocomplete="off"  name="telf_empre" id="telf_empre" placeholder="Escriba un número de contacto">
                        <input type="password" autocomplete="off"  name="password_1" id="password_1" placeholder="Escriba una contraseña">
                        <input type="password" autocomplete="off"  name="password_2" id="password_2" placeholder="Repita la contraseña">
                        <input type="text" autocomplete="off"  name="correo_empre" id="correo_empre" placeholder="Correo electrónico de la empresa">
                        <input type="text" autocomplete="off"  name="contacto" id="contacto" placeholder="Indique una persona contacto">
                        <div id="html_element" align="center"></div>
                        <div class="mensaje-form" id="div_mensaje_1"></div>
                        <input type="submit" value="Registrarse" name="btn_registro" id="btn_registro">
		</form>
             <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	</section>

	<section class="slider">
		<div class="flexslider">
			<ul class="slides">
				<li>
                                    <img src="../libreriasEmpresa/img/slide-01.jpg" alt="uno" />
					<p class="flex-caption">Jorge</p> 
				</li>
				<li>
                                    <img src="../libreriasEmpresa/img/slide-02.jpg" alt="dos" />
				</li>
				<li>
                                    <img src="../libreriasEmpresa/img/slide-03.jpg" alt="tres" />
				</li>
			</ul>
		</div>
	</section>
</body>
</html>
