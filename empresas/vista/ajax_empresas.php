
<!-- <form onsubmit="solicitarDescargarArchivos(this); return false"
	action="?" method="get"> -->

<div id="filtros" style="display: none;">

<br><br>
<input type="hidden" name="identity_prefix"
	value="<?=($_GET["identity_prefix"]) ?>">
	
<input type="hidden" name="identity_number"
	value="<?=($_GET["identity_number"]) ?>">

	
</div>
<span id="tabla_archivos" class="lista">
<?php include 'ajax_recargar_tabla_archivos.php'; ?>
</span>


<!-- <button><span class="icon-search"></span><input type="submit" value="Download" style="background: none;color: white;"></button> -->

<!-- </form> -->