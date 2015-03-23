<?php include '../modelo/MensajeSMS.php';
$sms = new MensajeSMS();
//die("antes");
$code = $sms->generateCode($_GET["cell_phone"], $_GET['file'], $_GET["user_id"]);
//die("hola");
//echo "CODIGO =".$code;
//if(!$sms->sendSMS()){
if(!true){
	?>
	error=Opps, something is bad, the SMS could not be sent<fin_error>
	<?php
}else{
	echo "<inicio_code>$code<fin_code>";
	echo "<identity_prefix>".$_GET["identity_prefix"]."<fin_identity_prefix>";
	echo "<identity_number>".$_GET["identity_number"]."<fin_identity_number>";
	echo "<user_id>".$_GET["user_id"]."<fin_user_id>";
	echo "<cell_phone>".$_GET["cell_phone"]."<fin_cell_phone>";
	$count = 1;
	foreach ($_GET["file"] as $value) {
		echo "<file_$count>$value<fin_file_$count>";
		$count++;
	}
	
}
?>