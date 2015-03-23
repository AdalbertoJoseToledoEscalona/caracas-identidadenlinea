/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function validar_login_empresa(){
    document.getElementById("div_mensaje").innerHTML="";
    if(document.getElementById("txt_login").value==""){
        document.getElementById("div_mensaje").innerHTML="<b>Por favor ingrese el Rif</b>";
        return false;
    }
    if(document.getElementById("txt_password").value==""){
        document.getElementById("div_mensaje").innerHTML="<b>Por favor ingrese la contraseña</b>";
        return false;
    }
    /*if(document.getElementById("validacion_login").value=="0"){
        return false;
    }*/
    return true;
}

       
function validar_ingreso(){
    var password = document.getElementById("txt_password").value;
    var login = document.getElementById("txt_login").value;
       // alert(login);
    if(password!="" && password!=""){
        $("#div_mensaje").fadeOut("slow");
        $.ajax({type: "POST",url:"../modelo/ajax_validaciones.php",data:"password="+password+"&login="+login+"&validar=1",success:function(msg){
        $("#div_mensaje").fadeIn("slow",function(){
        $("#div_mensaje").html(msg);
        if(msg!=""){
           document.getElementById("txt_password").value="";
        }
        })
        }})
   }
}

function validar_reg_empresa(){
    
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(document.getElementById("rif").value==""){
         document.getElementById("div_mensaje_1").innerHTML="<b>Por favor ingrese el Rif</b>";
         return false;
    }
    if(document.getElementById("name_empre").value==""){
        document.getElementById("div_mensaje_1").innerHTML="<b>Por favor ingrese el nombre de la Empresa</b>";
        return false;
    }

    if(document.getElementById("telf_empre").value==""){
        document.getElementById("div_mensaje_1").innerHTML="<b>Por favor ingrese número de teléfono contacto</b>";
        return false;   
    }
    if (isNaN(document.getElementById("telf_empre").value)) {
        document.getElementById("div_mensaje_1").innerHTML="<b>El Nro. de teléfono debe ser númerico</b>";
        return false;  
    }

    if(document.getElementById("password_1").value==""){
        document.getElementById("div_mensaje_1").innerHTML="<b>Por favor ingrese la contraseña</b>";
        return false;          
    }
    if(document.getElementById("password_2").value==""){
        document.getElementById("div_mensaje_1").innerHTML="<b>Por favor repita la contraseña</b>";
        return false;          
    }
    if(document.getElementById("password_1").value!=document.getElementById("password_2").value){
        document.getElementById("password_1").value="";
        document.getElementById("password_2").value="";
        document.getElementById("div_mensaje_1").innerHTML="<b>Las contraseñas son diferentes</b>";
        return false;       
    }
    if(validatePass("password_1")=="0"){
        document.getElementById("div_mensaje_1").innerHTML="<b>La contraseña debe contener entre 8 y 10 caracteres, al menos un digito y un alfanumérico, y no  puede contener caracteres especiales";
        return false;       
    }
    if(document.getElementById("correo_empre").value==""){
        document.getElementById("div_mensaje_1").innerHTML="<b>Por favor ingrese la dirección de correo</b>";
        return false;        
    }
    if ( !expr.test(document.getElementById("correo_empre").value) ){
        document.getElementById("div_mensaje_1").innerHTML="<b>La dirección de correo " + document.getElementById("correo_empre").value + " es incorrecta</b>";
        return false;        
    }
    
    if(document.getElementById("contacto").value==""){
        document.getElementById("div_mensaje_1").innerHTML="<b>Por favor ingrese nombre de la persona contacto</b>";
        return false;          
    }
    if(document.getElementById("g-recaptcha-response").value==""){
        document.getElementById("div_mensaje_1").innerHTML="<b>Por favor ingrese código captcha</b>";
        return false;            
    }
}

function validatePass(campo) {
    var RegExPattern = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/;
    var errorMessage = 'Password Incorrecta.';
    if ((document.getElementById(campo).value.match(RegExPattern)) && (document.getElementById(campo).value!='')) {
        return '1';
    } else {
        return '0';
    } 
}


function validar_id_empre(){
    var rif = document.getElementById("rif").value;
       // alert(login);
    if(rif!=""){
        $("#div_mensaje_1").fadeOut("slow");
        $.ajax({type: "POST",url:"../modelo/ajax_validaciones.php",data:"rif="+rif+"&validar=2",success:function(msg){
        $("#div_mensaje_1").fadeIn("slow",function(){
        $("#div_mensaje_1").html(msg);
        if(msg!=""){
            document.getElementById("rif").value="";            
        }
        })
        }})
   }
}