<?php 

session_start();
unset($_SESSION['Guest']);
unset($_SESSION['GuestId']);		

header("Location: index.php")


?>