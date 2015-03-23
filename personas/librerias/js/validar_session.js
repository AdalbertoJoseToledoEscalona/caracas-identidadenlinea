function validar_session()
{
	var bordeRojo  = "3px solid red";
	var bordeNegro = "2px solid";
	var fallas     = 0;
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	
    //email
	if (document.getElementById("user").value=="")
	{
		 if($("#user").val().indexOf('@', 0) == -1 || $("#user").val().indexOf('.', 0) == -1) 
		 {
	            //alert('El correo electrónico introducido no es correcto.');
	            fallas++;
	    		document.getElementById("user").style.border     =bordeRojo;
	    		document.getElementById("mensaje_validacion2").style.display= "block";
	        }

	      //alert('El email introducido es correcto.');
	}
	else
	{
		if($("#user").val().indexOf('@', 0) == -1 || $("#user").val().indexOf('.', 0) == -1) 
		{ 
			document.getElementById("user").style.border     =bordeRojo;
                        document.getElementById("mensaje_validacion2").style.display= "block";
		}
		else
		{
			 document.getElementById("mensaje_validacion2").style.display= "none";
			 document.getElementById("user").style.border     =bordeNegro;
		}
	}
		
	//password
	if (document.getElementById("pass").value=="")
	{
            
		fallas++;
		document.getElementById("pass").style.border     =bordeRojo;
	}
	else
            
		document.getElementById("pass").style.border     =bordeNegro;
	
      
	if( parseInt(fallas)>0 ) //SI HAY FALLAS
	{
            //alert('1');
	      document.getElementById("mensaje_validacion").style.display= "block";
	      return false;
	}
	else if( parseInt(fallas)==0 ) //SI NO HAY FALLAS
	{
		 if($("#user").val().indexOf('@', 0) == -1 || $("#user").val().indexOf('.', 0) == -1) 
		 {
                     //alert('2');
			 document.getElementById("mensaje_validacion").style.display= "none";
			 document.getElementById("user").style.border     =bordeRojo;
                         document.getElementById("mensaje_validacion2").style.display= "block";
	         return false;
	     }
		 else
		 {
                     //alert('3');
			 document.getElementById("mensaje_validacion").style.display= "none";
			 document.form_login.submit();	  
		 }
	}
}

function validar_registro()
{
	var bordeRojo  = "3px solid red";
	var bordeNegro = "2px solid";
	var fallas     = 0;
   // var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	
	//cedula
	if (document.getElementById("nac").value=="")
	{
		fallas++;
		document.getElementById("nac").style.border     =bordeRojo;
	}
	else
		document.getElementById("nac").style.border     =bordeNegro;
	
	if (document.getElementById("ci_reg").value=="")
	{
		fallas++;
		document.getElementById("ci_reg").style.border     =bordeRojo;
	}
	else
		document.getElementById("ci_reg").style.border     =bordeNegro;
	
	if (document.getElementById("nombre").value=="")
	{
		fallas++;
		document.getElementById("nombre").style.border     =bordeRojo;
	}
	else
		document.getElementById("nombre").style.border     =bordeNegro;
	
	if (document.getElementById("apellido").value=="")
	{
		fallas++;
		document.getElementById("apellido").style.border     =bordeRojo;
	}
	else
		document.getElementById("apellido").style.border     =bordeNegro;
	
	if (document.getElementById("pass_r").value=="")
	{
		fallas++;
		document.getElementById("pass_r").style.border     =bordeRojo;
	}
	else
		document.getElementById("pass_r").style.border     =bordeNegro;
        
        if (document.getElementById("g-recaptcha-response").value=="")
	{
            
		fallas++;
		document.getElementById("g-recaptcha-response").style.border     =bordeRojo;
	}
	else
            
		document.getElementById("g-recaptcha-response").style.border     =bordeNegro;
	 	
	if (document.getElementById("conPass_reg").value=="")
	{
		fallas++;
		document.getElementById("conPass_reg").style.border     =bordeRojo;
	}
	else
	{
		if( (document.getElementById("pass_r").value) != (document.getElementById("conPass_reg").value)) 
		{
			document.getElementById("conPass_reg").style.border     =bordeRojo;
	        document.getElementById("mensaje_validacion3_reg").style.display= "block";
	        document.getElementById("mensaje_validacion2_reg").style.display= "none";
	        return false;
	    }
		else
		{
			document.getElementById("conPass_reg").style.border     =bordeNegro;
		}
	}
	
	if (document.getElementById("cel").value=="")
	{
		fallas++;
		document.getElementById("cel").style.border     =bordeRojo;
	}
	else
		document.getElementById("cel").style.border     =bordeNegro;
	
    //email
	if (document.getElementById("email").value=="")
	{
		 if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) 
		 {
	        //alert('El correo electrónico introducido no es correcto.');
	        fallas++;
			document.getElementById("email").style.border     =bordeRojo;
			document.getElementById("mensaje_validacion2_reg").style.display= "block";
	     }

	       // alert('El email introducido es correcto.');
	}
	else
	{
		 if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) 
		 {
			 document.getElementById("email").style.border     =bordeRojo;
	         document.getElementById("mensaje_validacion2_reg").style.display= "block";
	         return false;
	     }
		 else
		 {
			 document.getElementById("email").style.border     =bordeNegro;
		 }
	}
		
	if( parseInt(fallas)>0 ) //SI HAY FALLAS
	{
	      document.getElementById("mensaje_validacion_reg").style.display= "block";
	      return false;
	}
	else if( parseInt(fallas)==0 ) //SI NO HAY FALLAS
	{
		 document.getElementById("mensaje_validacion_reg").style.display= "none";
		 document.form_regitro.submit();	  
	}
}

function validarLetras(e) 
{ // 1
tecla = (document.all) ? e.keyCode : e.which; 
if (tecla==8) return true; // backspace
	if (tecla==32) return true; // espacio
	if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
	if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
	if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
 
		patron = /[a-zA-Z]/; //patron
 
		te = String.fromCharCode(tecla); 
		return patron.test(te); // prueba de patron
}


function validarNumeros(e) 
{ // 1
	tecla = (document.all) ? e.keyCode : e.which; // 2
	if (tecla==8) return true; // backspace
	if (tecla==109) return true; // menos
if (tecla==110) return true; // punto
	if (tecla==189) return true; // guion
	if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
	if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
	if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
	if (tecla>=96 && tecla<=105) { return true;} //numpad

	patron = /[0-9]/; // patron

	te = String.fromCharCode(tecla); 
	return patron.test(te); // prueba
}