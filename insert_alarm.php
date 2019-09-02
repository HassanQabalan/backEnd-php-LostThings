<?php 
include("config.php");

$id_sp_home=$_POST["id_sp_home"];
$id_sp_family=$_POST["id_sp_family"];
$text_alarm=$_POST["text_alarm"];
$role=$_POST["role"];

// $id_build = mysqli_query($con,"SELECT id FROM build WHERE name='$name_sp_home' ");
// $result=mysqli_fetch_array($id_build);
// $id_build=$result['id'];

// $id_family= mysqli_query($con,"SELECT id FROM family WHERE name='$name_sp_family' ");
// $result=mysqli_fetch_array($id_family);
// $id_family=$result['id'];



mysqli_query($con,"insert into alarm (id_build,	id_family,text_alarm,role)values('$id_sp_home','$id_sp_family','$text_alarm','$role')")or die(mysqli_error($con));



	
	
?>