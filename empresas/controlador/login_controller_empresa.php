<?php
session_start();
include_once '../modelo/registro_empresa_class.php';
$registro_empresa   = new registro_empresa();

if(isset($_POST["btn_ingresar"])){
    $txt_password   =   md5($_POST["txt_password"]);
    $txt_login      =   $_POST["txt_login"];

    if($txt_password!=""){
        if($txt_login!=""){
            $result_empre=$registro_empresa->login($txt_login,$txt_password);
            if($result_empre[0]['nombre_empresa']!=""){
               $cant_total_doc=$registro_empresa->cant_total_doc();
               $_SESSION["cant_archivos_total"]=$cant_total_doc[0]['cant_archivos_total']; 
               $_SESSION["nombre_empresa"]=$result_empre[0]['nombre_empresa']; 
        	header("Location: ../vista/empresa.php");
            }else{
                print "<script>alert('Rif o contraseña incorrectos');</script>";
                print  '<script>window.history.go(-1)</script>';   
            }
        }else{
            print "<script>alert('Debe ingresar el Rif');</script>";
            print  '<script>window.history.go(-1)</script>';
        }
    }else{
        print "<script>alert('Debe ingresar la contraseña');</script>";
        print  '<script>window.history.go(-1)</script>';
    }

}

if(isset($_POST["btn_registro"])){
    
    $rif            =   trim($_POST["rif"]);
    $name_empre     =   trim($_POST["name_empre"]);
    $telf_empre     =   trim($_POST["telf_empre"]);
    $password_1     =   $_POST["password_1"];
    $password_2     =   $_POST["password_2"];
    $correo_empre   =   trim($_POST["correo_empre"]);
    $contacto       =   trim($_POST["contacto"]);
    
    if($_POST['g-recaptcha-response']==""){
        print "<script>alert('Ingrese el código captcha');</script>";
        print  "<script>window.history.go(-1)</script>";  
    }
    
    $captcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LcyfgMTAAAAAP66vfcdz2oSutb8_zT8xSXll93H&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']),TRUE);
        if($captcha['success']=== FALSE){
            print "<script>alert('La imagen no coincide con lo escrito');</script>";
            print  "<script>window.history.go(-1)</script>";
    } 
    
    if($rif ==""){
        print "<script>alert('Debe ingresar el Rif');</script>";
        print  '<script>window.history.go(-1)</script>';
    }

    
    if($name_empre ==""){
        print "<script>alert('Debe ingresar el nombre de la empresa');</script>";
        print  '<script>window.history.go(-1)</script>';
    }
    
    if($telf_empre ==""){
        print "<script>alert('Debe ingresar el nro. de teléfono de la empresa');</script>";
        print  '<script>window.history.go(-1)</script>';
    }   

    if($password_1 ==""){
        print "<script>alert('Debe ingresar la contraseña');</script>";
        print  '<script>window.history.go(-1)</script>';
    }   
    if($password_2 ==""){
        print "<script>alert('Debe confirmar la contraseña');</script>";
        print  '<script>window.history.go(-1)</script>';
    }     
    if($password_1 != $password_2){
        print "<script>alert('Las contraseñas son diferentes');</script>";
        print  '<script>window.history.go(-1)</script>';
    }
    if($correo_empre ==""){
        print "<script>alert('Debe ingresar la dirección de correo');</script>";
        print  '<script>window.history.go(-1)</script>';
    }
    if($contacto ==""){
        print "<script>alert('Debe ingresar nombre de la persona contacto');</script>";
        print  '<script>window.history.go(-1)</script>';
    } 
    
   
    $result= $registro_empresa->guardarRegistro($rif, $name_empre, $telf_empre,md5($password_1),$correo_empre, $contacto );
    
    if($result){
        $message    =   utf8_encode("Muchas gracias por registrarse en Identidad en Línea.<br><br>Su registro ha sido satisfactorio, en las proximas horas nuestros consultores lo estarán contactando");
        $subject    =   "Registro satisfactorio ".$rif;
        $to         =   $correo_empre;
        $from       =   "emile769@gmail.com";
        $headers    =   "From:" . $from;
        //$enviado    =   mail($to,$subject,$message,$headers);
        
        $var_enviar='0';
        
        if($enviado){
           $var_enviar='0';             
        }
        
       $save_email =   $registro_empresa->guardar_email($from,$to,$subject,$message,$headers,$var_enviar);
       
        $_SESSION["exito_1"]="1";
        print "<script>alert('Registro satisfactorio. En las próximas horas lo estaremos contactanto');</script>";
        header("Location: ../vista/registro_empresa.php");
    }else{
        print "<script>alert('Disculpe la empresa no pudo ser registrada. Por favor intente nuevamente');</script>";
        print  '<script>window.history.go(-1)</script>';
    }
 }
?>