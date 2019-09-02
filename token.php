<?php 
include("config.php");
$token = $_POST["Token"];
$massage = $_POST["massage"];


mysqli_query($con,"insert into token (  token , massage )values('$token' ,'$massage')")or die(mysqli_error($con));



?>