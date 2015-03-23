<?php session_start();
$usuario=$_SESSION['id'];
//$identity=$_SESSION['identity'];
include_once '../modelo/registro_Class.php';
$multiupload= new Multiupload();
switch ($_REQUEST['acc'])
{
	case 'N':
		$numa = 0;
		
		if($_FILES["cedula"] != "")
		{
			$files =$_FILES["cedula"];
			$mu=$multiupload->upFiles($usuario,"cedula","cedula",$numa,$files);
		}
		if($_FILES["rif"] != "")
		{
			$files =$_FILES["rif"];
			$mu=$multiupload->upFiles($usuario,"rif","rif",$numa,$files);
		}
		if($_FILES["nac"] != "")
		{
			$files =$_FILES["nac"];
			$mu=$multiupload->upFiles($usuario,"nac","partida de nacimiento",$numa,$files);
		}
		if($_FILES["servicio"] != "")
		{
			$files =$_FILES["servicio"];
			$nombre_servicio=$_POST['servicios'];
			if ($nombre_servicio!="")
				$nombre_servicio=$nombre_servicio;
			else 
				$nombre_servicio="Servicios";
			$mu=$multiupload->upFiles($usuario,"servicio",$nombre_servicio,$numa,$files);
		}
		if($_FILES["pas"] != "")
		{
			$files =$_FILES["pas"];
			$mu=$multiupload->upFiles($usuario,"pas","pasaporte",$numa,$files);
		}
		if($_FILES["otro"] != "")
		{
			$files =$_FILES["otro"];
			$nombre_servicio=$_POST['otros'];
			if ($nombre_servicio!="")
				$nombre_servicio=$nombre_servicio;
			else
				$nombre_servicio="Otros";
			$mu=$multiupload->upFiles($usuario,"otro",$nombre_servicio,$numa,$files);
		}
		
		
		
		
		
		
		if($mu == true)
		{
			$_SESSION["alert"]="1";
			header("Location: ../vista/index.php");
		}
		else if($mu == "3")
		{
			print "<script>alert('No seleccione ningun archivo');</script>";
			print  '<script>window.history.go(-1)</script>';
		}
		else if($mu == false)
		{
			print "<script>alert('La extension no esta permitida');</script>";
			print  '<script>window.history.go(-1)</script>';
		}
		
		break;
}
?>
