<?php session_start();
//$usuario='5';
$usuario=$_SESSION['id'];
$identity=$_SESSION['identity'];
include_once '../class/registro_Class.php';
$multiupload= new Multiupload();

$nombreArchivo = $_FILES['user_file']['name'];
$tipoArchivo = $_FILES['user_file']['type'];
$tempArchivo = $_FILES['user_file']['tmp_name'];

$etiqueta=$_POST['etiqueta'];

switch ($_REQUEST['acc'])
{
	case 'N':
		$numa = 0;
		
		if($_FILES['user_file'] != "")
		{
			$files =$_FILES['user_file'];
			$mu=$multiupload->upFiles($usuario,'user_file',$etiqueta,$numa,$files);
		}
                
                echo '<pre>';
                print_r($mu);
                echo '</pre>';
		
//		if($mu == true)
//		{
//			$_SESSION["alert"]="1";
//			header("Location: ../app/index.php");
//		}
//		else if($mu == false)
//		{
//			print "<script>alert('La extension no esta permitida');</script>";
//			print  '<script>window.history.go(-1)</script>';
//		}
		
		break;
}
?>
