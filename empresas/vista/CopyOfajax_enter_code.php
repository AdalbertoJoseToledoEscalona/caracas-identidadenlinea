<?php include '../modelo/MensajeSMS.php';
?>

<h3>type the code sended to the User and click on Download</h3>

<form class="carga-doc" method="post" action="../bin/downloaded.php" onsubmit="return validarCodigo(this, '<?=$_GET['code'] ?>')">
<!-- <form class="carga-doc" method="post" action="../bin/downloaded_test.php" onsubmit="return validarCodigo(this, '<?=$_GET['code'] ?>')"> -->
<input class="campo-buscar" type="text" name="code" placeholder="Ingrese la cédula de identidad" >
<input type="hidden" name="usuario" value="<?=$_GET["userId"];?>">
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
<button><span class="icon-search"></span><input type="submit" value="Download" style="background: none;color: white;"></button>
</form>
