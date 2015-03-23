<?php 
include_once("../modelo/archivo_Class.php");

$archivo = new Archivo();
$archivos = $archivo->listar_archivos($_GET['identity_prefix'] . "-" . $_GET['identity_number']);
//echo 'archivo'.$archivos["user_id"];
/*echo "los datos<br>";
foreach ($archivos as $key => $value) {
    echo $key . " => " . $value. "<br>";
    foreach ($value as $key2 => $value2) {
        echo $key2 . " => " . $value2. "<br>";
    }
}*/
/*0 => Array
id => 5
doc_type => cedula
date_creation => 2015-03-08 14:34:58.785171
user_id => 4
cell_phone => 4123925745
1 => Array
id => 6
doc_type => rif
date_creation => 2015-03-08 14:34:59.368684
user_id => 4
cell_phone => 4123925745*/

?>

<?php $cont = 0; $userId = -1; foreach ($archivos as $fila) {
		$userId = $fila["user_id"];
		$cell_phone = $fila["cell_phone"];
                /*echo $fila["user_id"]."\t";
                echo $fila["cell_phone"]."\t";
                echo $fila["doc_type"] . "\t";
                echo $fila["id"] . "\t";
                echo "<br>";*/
		?>
	<div class="tooltip-lista" onclick="checkFile(<?php echo $cont; ?>, this)">
		<img src="../libreriasEmpresa/img/<?php echo "icon-".trim($fila["doc_type"]).".jpg"; ?>">
		<div class="arrow-up"></div>
		<span><input type="checkbox" name="file[]" value="<?php echo $fila["id"]; ?>"></span>
		<span><?php echo $fila["doc_type"]; ?></span>
	</div>
	<?php $cont++;}?>


<?php $archivo->cerrar();?>

<input type="hidden" name="user_id"
	value="<?php echo $userId ?>">
	
	<input type="hidden" name="cell_phone"
	value="<?php echo $cell_phone ?>">