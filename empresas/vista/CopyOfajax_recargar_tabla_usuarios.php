
<?php 

include_once("../modelo/archivo_Class.php");

$archivo = new Archivo();
$searchText = "";
if(isset($_GET['search_text'])){
	$searchText = $_GET['search_text'];
}
$archivos = $archivo->listar_usuarios($searchText);


/*$archivos = array(array("nombre 1", "2014-02-01", "Bancos"), array("nombre 2", "2014-02-02", "Personal"),
array("nombre 3", "2014-02-03", "Trabajo"),
array("nombre 1", "2014-02-01", "Bancos"), array("nombre 2", "2014-02-02", "Personal"),
array("nombre 3", "2014-02-03", "Trabajo"),
array("nombre 1", "2014-02-01", "Bancos"), array("nombre 2", "2014-02-02", "Personal"),
array("nombre 3", "2014-02-03", "Trabajo"),
array("nombre 1", "2014-02-01", "Bancos"), array("nombre 2", "2014-02-02", "Personal"),
array("nombre 3", "2014-02-03", "Trabajo"),
array("nombre 1", "2014-02-01", "Bancos"), array("nombre 2", "2014-02-02", "Personal"),
array("nombre 3", "2014-02-03", "Trabajo"),
array("nombre 1", "2014-02-01", "Bancos"), array("nombre 2", "2014-02-02", "Personal"),
array("nombre 3", "2014-02-03", "Trabajo"),
array("nombre 1", "2014-02-01", "Bancos"), array("nombre 2", "2014-02-02", "Personal"),
array("nombre 3", "2014-02-03", "Trabajo"),
array("nombre 1", "2014-02-01", "Bancos"), array("nombre 2", "2014-02-02", "Personal"),
array("nombre 3", "2014-02-03", "Trabajo"));*/
?>
<table id="reporte" border="2" cellpadding="5" cellspacing="5">
	<tr>
		<th>Name</th>
		<th>Last Name</th>
		<th>identity</th>
		<th>cell_phone</th>
		<th>Email</th>
	</tr>

	<?php $cont = 0; $userId = -1; foreach ($archivos as $fila) {
		$id = split("-", $fila["identity"]);
		?>
	<tr>
		<td><a href="javascript: ajaxBuscarUsuario('&identity_prefix=<?=$id[0] ?>&identity_number=<?=$id[1] ?>');"><?=$fila["name"] ?></a></td>
		<td><?=$fila["last_name"] ?></td>
		<td><?=$fila["identity"] ?></td>
		<td><?=$fila["cell_phone"] ?></td>
		<td><?=$fila["email"] ?></td>
	</tr>
	<?php $cont++;}?>

</table>
<div id="paginas"></div>
<?php $archivo->cerrar();?>

<script>
colocarPagina(1);
</script>