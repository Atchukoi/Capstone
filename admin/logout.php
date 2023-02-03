<?php 

session_start();
unset($_SESSION['adminid']);
unset($_SESSION['admin']);	
unset($_SESSION['role']);	

header("Location: index.php")


?>