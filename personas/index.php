<!DOCTYPE html>
<html lang="es-ES">

	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
        <script type="text/javascript" src="librerias/js/jquery.flexslider.js"></script>
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

<head>
	<!-- METAS -->
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- LINKS -->
        <link rel="stylesheet" type="text/css" href="librerias/css/identidad.css">

	<title>Identiad en línea</title>
</head>
<body>
	<section class="logo-id">
            <img src="librerias/img/logo-id-person.png">
	</section>

	<section class="log-reg">
            
            <?php include('app/ingreso.php'); ?>
            
            <?php include('app/registro.php'); ?>
		
		
	</section>

	<section class="slider">
		<div class="flexslider">
			<ul class="slides">
				<li>
                                    <img src="librerias/img/slide-01.jpg" alt="uno" />
				</li>
				<li>
                                    <img src="librerias/img/slide-02.jpg" alt="dos" />
				</li>
				<li>
                                    <img src="librerias/img/slide-03.jpg" alt="tres" />
				</li>
			</ul>
		</div>
	</section>
</body>
</html>