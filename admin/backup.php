<?php

include 'config.php';

$query = "SELECT * INTO OUTFILE 'database_backup.sql' FROM `user`";

$result = mysqli_query($conn,$query);



?>