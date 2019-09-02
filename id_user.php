<?php 
include("config.php");

$token_id=$_POST['token'];


$stmt = $con->prepare("SELECT id  FROM  user WHERE token='$token_id'  ");
	$stmt->execute();
	$stmt->bind_result($id );
		 $contact = array();
	while($stmt->fetch()){
		$temp = array();
		$temp['id']=$id;
	
		

    	array_push($contact, $temp);
	}
	echo json_encode($contact);
//	echo $id_post_1;
	
	
	

	
	
	
	
?>