<?php 
include("config.php");


$stmt = $con->prepare("SELECT id , supervisor_name,name_build ,image FROM supervisor_information");
$contact = array();
$stmt->execute();
	$stmt->bind_result($id ,$name,$build ,$image );

	while($stmt->fetch()){
		$temp = array();
		
		$temp['id_supervisor'] = $id; 
		$temp['name_supervisor'] = $name; 
		$temp['build_supervisor'] = $build;
		$temp['image'] = $image;
    	array_push($contact, $temp);
	}
	echo json_encode($contact);

	

	
?>