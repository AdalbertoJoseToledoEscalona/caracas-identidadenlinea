<div class="cont-menu">
	<!-- LOGOTIPO MENÚ -->
		<div class="logo-menu">
			<img src="../libreriasEmpresa/img/logo-nosotros.png">
		</div>

		<p class="name-user">
			<b><?php echo $_SESSION["nombre_empresa"];?></b>
		</p>

	<div class="arbol">
            <?php
                $total=fmod($_SESSION['cant_archivos_total'],12500)
                ?>
		<p id="money_cont"><?php echo $total?></p>
		<img src="../libreriasEmpresa/img/arbol.png">
	</div>

	<div class="co2">
            <?php $total_megas=$_SESSION['cant_archivos_total']*10;
                      $co=($total_megas*0.3)/1024;  ?>
		<p>CO2 Footprint</p>
		<p id="co2_cont"><?php echo $co ?></p>
	</div>
</div>
