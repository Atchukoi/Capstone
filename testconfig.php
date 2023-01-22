<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "old";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("<script>alert('Connection Failed')</script>");
  }
  
?>