<?php

require "firebase1.php";
$firebase1_token = $_POST[""];
//$sql = "isert into firebase_db values ('".$firebase1_token"');";
mysql_db_query($con,$sql);
mysql_close($con);

?>