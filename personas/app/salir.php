<?php
session_start();
session_unset(); 
session_destroy(); 
echo '<SCRIPT>window.location.href="../index.php"</SCRIPT>';
?>
