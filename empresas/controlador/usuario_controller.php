<?php session_start();
include_once '../modelo/usuario_Class.php';
$usuario= new usuario();

switch ($_GET['acc']){
	case 'E':	
		$usu=$usuario->editar($_POST['id'],$_POST['nombres'],$_POST['usuario'],$_POST['clave'],$_POST['numero'],$_POST['email'],$_POST['tipo_usuario'],$_SESSION['id']);
		header("Location: ../vista/registro_usuario.php?_=e&ed=1&id=".$_POST['id']);
		break;
		
	case 'N':
             $captcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LcyfgMTAAAAAP66vfcdz2oSutb8_zT8xSXll93H&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']),TRUE);
             if($captcha['success']=== FALSE){
                  print "<script>alert('Ingrese código captcha');</script>";
                    print  "<script>window.history.go(-1)</script>";
             } 

                // secret(required)	6LcyfgMTAAAAAP66vfcdz2oSutb8_zT8xSXll93H
                //response(required)	El valor de "g-recaptcha-response".
                //remoteip	The end user's ip address.
		if( ($_POST['nac'] == "") || ($_POST['ci'] == "") || ($_POST['nombre'] == "") || ($_POST['apellido'] == "")  || ($_POST['pass'] == "")
 			|| ($_POST['conPass'] == "")  || ($_POST['cel'] == "") || ($_POST['email'] == ""))
		{
			print "<script>alert('Debe llenar todos los campos');</script>";
			print  '<script>window.history.go(-1)</script>';
		}
		else if( $_POST['pass'] != $_POST['conPass'] )
		{
			print "<script>alert('Las contrase\u00F1as son diferentes');</script>";
			print  '<script>window.history.go(-1)</script>';
		}
		else
		{
			$email_a = $_POST['email'] ;
			if (filter_var($email_a, FILTER_VALIDATE_EMAIL))
			{
				$cedula=$_POST['nac'].'-'.$_POST['ci'];
				
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
					$cedula=$_POST['nac'].'-'.$_POST['ci'];
					$usu=$usuario->agregar($cedula,$_POST['nombre'],$_POST['apellido'],$_POST['pass'],$_POST['cel'],$_POST['email']);
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
		header("Location: ../vista/lista_usuario.php?del=1");
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
				header("Location: ../vista/index.php");
				$usu=$usuario->login($_POST['user'],md5($_POST['pass']));
				if ($usu)
				{
					$_SESSION['id']=$usu[0]['id'];
					$_SESSION['identity']=$usu[0]['identity'];
					header("Location: ../vista/index.php");
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