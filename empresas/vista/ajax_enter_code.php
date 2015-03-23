<?php include '../modelo/MensajeSMS.php';
?>
<span class="lista" method="post" action="../bin/downloaded.php" onsubmit="return validarCodigo(this, '<?=$_GET['code'] ?>')">
<input class="campo-codigo" style="text-align:center" type="text" name="code" placeholder="Code">
<input type="hidden" name="usuario" value="<?=$_GET["userId"];?>">

<?php 
$files = "";
for ($i = 0; $i < count($_GET["file"]); $i++) {
   		if($i == count($_GET["file"])  - 1){
   			$files .= $_GET["file"][$i];
   		}else{
   			$files .= $_GET["file"][$i].",";
   		}
   		
   	}
   ?>
<input type="hidden" name="files" value="<?=$files?>">
<button class="enviar-cod" onclick="return validarCodigo(document.getElementById('listadoc1_<?=$_GET['num'] ?>'), '<?=$_GET['code'] ?>');"><span class="icon-floppy-disk"><input type="submit" name="sendCode" onclick="alert('hola'); return false;" value="" style="background: none;color: white;">Download</span></button>
</span>	