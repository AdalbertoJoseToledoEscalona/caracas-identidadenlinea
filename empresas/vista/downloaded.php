<?php

//echo 'python ../bin/ppl.py val_otp '. $_POST["userId"] .' '. $_POST["code"];

//exec('python ../bin/ppl.py val_otp '. $_POST["userId"] .' '. $_POST["code"],$output,$ret_code);
//exec('python ppl.py val_otp 1 65a3332',$output,$ret_code);
//echo $output[0] == true ? '1' : '0';
//die();
   if(true){

   	$files =  '"'.$_POST["files"].'"';
   	
   	// exec('python ../bin/ppl.py upload ../bin/clave_publica.pem '.$usuario.' "'.$total.'"',$output,$ret_code);
//echo "output ".$output[0]."\r";
   	
   	echo 'python ../bin/ppl.py download ../bin/clave_privada.pem '. $_POST["usuario"] .' '.$files;
   	
   	echo "<br>";
   	exec('python ../bin/ppl.py download ../bin/clave_privada.pem '. $_POST["usuario"] .' '.$files,$output,$ret_code);
   	echo "output ".$output[0]."\r";
   }else{
   		echo "Incorrect code";
   }
   
?>