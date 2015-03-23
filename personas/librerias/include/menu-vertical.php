<div class="cont-menu">
	<p class="name-user">
		<b>Bienvenido(a),</b> <?php echo $_SESSION['name']." ".$_SESSION['last_name']?>
		<br>
		Cantidad de archivos: <b><?php echo $_SESSION['cant_archivos'] ?></b>
	</p>

	<div class="arbol">
                <?php
                $total=fmod($_SESSION['cant_archivos_total'],12500)
                ?>
                <p>
                <?php echo $total?></p>
		<img src="../librerias/img/arbol.png">
	</div>

	<div class="co2">
		<p>Huella CO2</p>
                <?php $total_megas=$_SESSION['cant_archivos_total']*10;
                      $co=($total_megas*0.3)/1024;  ?>
		<p><?php echo $co ?></p>
	</div>
        <div class="co2">
		<p>Dinero Ahorrado</p>
                <?php $dinero=$_SESSION['cant_archivos']*5 ?>
		<p><?php echo $dinero ?>Bs</p>
	</div>
</div>