<script type="text/javascript">
	/*function open() {
		document.getElementById("listadoc").style.display="";
	}*/

	/*function close() {
		document.getElementById("listadoc").style.display="none";
	}*/
</script>

<div class="cont-doc">
	<!-- BÚSQUEDA CON LA CI -->
	<form class="form-ci" action="?" method="get" name="form" onsubmit="buscarPersonas(this, false); return false;" id="form_personas">
	<div id="error" class="error"></div>
		<input class="campo-buscar" type="text" name="search_text" placeholder="Enter any customer data">
		
		<button><span class="icon-search"><input type="submit" value="" style="background: none;color: white;">Search</span></button>
		<?php $pag = 1; ?>
		<input type="hidden" name="pagina" value="<?=$pag ?>">
		<?php $filasPorPaginas = 10; ?>
		<input type="hidden" name="filas_por_pagina" value="<?=$filasPorPaginas ?>">
	</form>

	<!-- RESULTADOS TIPO TWITTER -->
	<div id="files">
		<?php include 'ajax_recargar_tabla_usuarios.php';?>

	<!-- PAGINACIÓN -->
	<!-- <nav class="paginas">
		<ul>
			<li><a href=""><-Primera hoja</a></li>
			<li><a href=""><< Anterior</a></li>
			<li><a href="">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">Siguiente >></a></li>
			<li><a href="">Última hoja -></a></li>
		</ul>
	</nav> -->
	</div>
</div>
