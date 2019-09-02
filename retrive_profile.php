<?php 
include("config.php");



$token = $_POST["token"];
 
 
 $contact=array();
  
  
  $stmt = $con->prepare("SELECT first_name,  image ,phone_number FROM user WHERE token='$token'  ");

	$stmt->execute();
	
	$stmt->bind_result($first_name ,$image  ,$phone_number);
	//	 
	while($stmt->fetch()){
		$temp = array();
		$temp['x']='1';
     //	$id_new= $id_post; 
        $temp['image']=$image;
		$temp['phone_number'] = $phone_number; 
		$temp['first_name']=$first_name;

	
    
    		array_push($contact, $temp);
	}
	echo json_encode($contact);
