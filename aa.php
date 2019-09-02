<?php 
include("config.php");

$Password = $_POST["Password"];
$Email = $_POST["Email"];
mysqli_query($con,"insert into ll(email,password)values('$Email','$Password')")or die(mysqli_error($con));



?>