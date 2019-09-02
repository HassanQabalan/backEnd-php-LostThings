<?php 
include("config.php");

$contact = array();

$mysqle =  "SELECT * FROM visit_requests_in_build";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0){

$stmt = $con->prepare("SELECT id,id_family,destination,reason_visit,family_kinship,destination_phone,startDateVisit	,endDateVisit,building_id FROM  visit_requests_in_build ");

	$stmt->execute();
	
	$stmt->bind_result($id,$id_family, $destination,$reason_visit,$family_kinship,$destination_phone,$startDateVisit,$endDateVisit,$building_id);

	while($stmt->fetch()){
		$temp = array();
	    $temp['id'] = $id; 
	    $temp['id_family'] = $id_family; 
	    $temp['destination'] = $destination; 
	    $temp['reason_visit'] = $reason_visit; 
	    $temp['family_kinship'] = $family_kinship; 
	    $temp['destination_phone'] = $destination_phone; 
	    $temp['startDateVisit'] = $startDateVisit; 
	    $temp['building_id'] = $building_id; 
	    $temp['endDateVisit'] = $endDateVisit; 
	

    
    		array_push($contact, $temp);
	}}
	echo json_encode($contact);

	
	
?>