<?php 
include("config.php");

$id_build=$_POST["id_build"];

$contact=array();

$stmt = $con->prepare("SELECT id,name,rate_family,number_childe FROM  family WHERE id_build='$id_build' ");

	$stmt->execute();
	
	$stmt->bind_result($id,$name,$rate_family,$number_childe );

	while($stmt->fetch()){
		$temp = array();
	$temp['id'] =$id; 
        $temp['name']=$name;
        $temp['rate_family']=$rate_family;
        $temp['number_childe']=$number_childe;    

    		array_push($contact, $temp);
	}
	echo json_encode($contact);

	
	
?>