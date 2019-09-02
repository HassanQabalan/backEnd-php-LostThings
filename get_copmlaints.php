<?php 
include("config.php");

$contact = array();

$mysqle =  "SELECT * FROM complaints";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0){

$stmt = $con->prepare("SELECT id,text_complaint	,Type_Reciving FROM  complaints ");

	$stmt->execute();
	
	$stmt->bind_result($id,$text_complaint, $Type_Reciving);

	while($stmt->fetch()){
		$temp = array();
	$temp['id'] = $id; 
    
        $temp['text_complaint']=$text_complaint;
         $temp['Type_Reciving']=$Type_Reciving;
		
	

    
    		array_push($contact, $temp);
	}}
	echo json_encode($contact);

	
	
?>