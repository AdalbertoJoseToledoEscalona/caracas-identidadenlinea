
<?php 

include_once("../modelo/archivo_Class.php");

$archivo = new Archivo();
$archivos = $archivo->listar_archivos($_GET['identity_prefix'] . "-" . $_GET['identity_number']);


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
<table id="reporte" border="2">
	<tr>
		<th></th>
		<th>Fecha</th>
		<th>Tipo</th>
	</tr>

	<?php $cont = 0; $userId = -1; foreach ($archivos as $fila) {
		$userId = $fila["user_id"];
		$cell_phone = $fila["cell_phone"];
		?>
	<tr>
		<td><input type="checkbox" name="file[]" value="<?=$fila["id"] ?>"></td>
		<td id="date_<?=($cont+1) ?>"><?=$fila["date_creation"] ?></td>
		<td id="type_<?=($cont+1) ?>"><?=$fila["doc_type"] ?></td>
	</tr>
	<?php $cont++;}?>

</table>
<div id="paginas"></div>
<?php $archivo->cerrar();?>

<input type="hidden" name="user_id"
	value="<?=$userId ?>">
	
	<input type="hidden" name="cell_phone"
	value="<?=$cell_phone ?>">