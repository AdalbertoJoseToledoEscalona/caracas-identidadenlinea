<?php
session_start();

$_SESSION['id']="";
$_SESSION['exito']="";
$_SESSION['identity']="";
$_SESSION['error']="";

session_destroy();
session_unset(); 

echo '<SCRIPT>window.location.href="../index.php"</SCRIPT>';
?>
