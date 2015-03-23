<?php session_start();
include_once '../class/usuario_Class.php';
$usuario= new usuario();

switch ($_GET['acc']){
	case 'E':	
		$usu=$usuario->editar($_POST['id'],$_POST['nombres'],$_POST['usuario'],$_POST['clave'],$_POST['numero'],$_POST['email'],$_POST['tipo_usuario'],$_SESSION['id']);
		header("Location: ../app/registro_usuario.php?_=e&ed=1&id=".$_POST['id']);
		break;
		
	case 'N':
		if( ($_POST['nac'] == "") || ($_POST['ci_reg'] == "") || ($_POST['nombre'] == "") || ($_POST['apellido'] == "")  || ($_POST['pass_r'] == "")
 			|| ($_POST['conPass_reg'] == "")  || ($_POST['cel'] == "") || ($_POST['email'] == ""))
		{
			print "<script>alert('Debe llenar todos los campos');</script>";
			print  '<script>window.history.go(-1)</script>';
		}
		else if( $_POST['pass_r'] != $_POST['conPass_reg'] )
		{
			print "<script>alert('Las contrase\u00F1as son diferentes');</script>";
			print  '<script>window.history.go(-1)</script>';
		}
		else
		{
			$email_a = $_POST['email'] ;
			if (filter_var($email_a, FILTER_VALIDATE_EMAIL))
			{
				$cedula=$_POST['nac'].'-'.$_POST['ci_reg'];
				
				$usus=$usuario->buscar($cedula,$_POST['email'],$_POST['cel']);
				 
				if($usus[0]['conteo_identity']>0)
				{
					print "<script>alert('C\u00E9dula de Identidad ya existe');</script>";
					print  '<script>window.history.go(-1)</script>';
				}
				else if($usus[0]['conteo_email']>0)
				{
					print "<script>alert('Email ya existe');</script>";
					print  '<script>window.history.go(-1)</script>';
				}
				else if($usus[0]['conteo_cell_phone']>0)
				{
					print "<script>alert('C\u00E9lular ya existe');</script>";
					print  '<script>window.history.go(-1)</script>';
				}
				else 
				{
					$cedula=$_POST['nac'].'-'.$_POST['ci_reg'];
					$usu=$usuario->agregar($cedula,$_POST['nombre'],$_POST['apellido'],$_POST['pass_r'],$_POST['cel'],$_POST['email']);
					if ($usu == true )
					{
						$_SESSION["exito"]="1";
						header("Location: ../index.php");
					}
					else
					{
						print "<script>alert('Problemas con la plataformas');</script>";
						echo '<script>window.history.go(-1)</script>';
					}
				}
			}
			else
			{
				print "<script>alert('Email esta incorrecto');</script>";
				print  '<script>window.history.go(-1)</script>';
			}
		}
		break;
		
	case 'DEL':
		$usu=$usuario->eliminar($_REQUEST['id'],$_SESSION['id']);
		header("Location: ../app/lista_usuario.php?del=1");
		break;
		
	case 'LOGIN':
		if( ($_POST['user'] == "") || ($_POST['pass'] == ""))
		{
			$_SESSION['error']="1";
			header("Location: ../index.php");
		}
		else
		{
			$email_a = $_POST['user'] ;
			if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) 
			{
				header("Location: ../app/index.php");
				$usu=$usuario->login($_POST['user'],md5($_POST['pass']));
				if ($usu)
				{
					$_SESSION['id']=$usu[0]['id'];
					$_SESSION['identity']=$usu[0]['identity'];
                                        $_SESSION['name']=$usu[0]['name'];
                                        $_SESSION['last_name']=$usu[0]['last_name'];
                                        $archivos=$usuario->cant_archivo($_SESSION['id']);
                                        $archivos_total=$usuario->cant_archivo_total();
                                        $_SESSION['cant_archivos']=$archivos[0]['cant_archivos'];
                                        $_SESSION['cant_archivos_total']=$archivos[0]['cant_archivos_total'];
					header("Location: ../app/index.php");
				}else {
					$_SESSION['error']="3";
					header("Location: ../index.php");
				}
			}
			else 
			{
				$_SESSION['error']="2";
				header("Location: ../index.php");
			}
		}
		
	case 'USUARIO':
		$usu=$usuario->buscarUsuario($_GET['usuario']);
		if ($usu)
		{
			print true;
		}else {
			print false;
		}
	 break;	
}
?>