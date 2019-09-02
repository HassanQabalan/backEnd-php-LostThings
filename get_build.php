<?php 
include("config.php");

$contact = array();

$result = mysqli_query($con,"SELECT COUNT(*) AS `count` FROM `family`");
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

$mysqle =  "SELECT * FROM build";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0){

$stmt = $con->prepare("SELECT id,name FROM  build ");

	$stmt->execute();
	
	$stmt->bind_result($id,$name );

	while($stmt->fetch()){
		$temp = array();
	$temp['id'] = $id; 
    
        $temp['name']=$name;
        
        $temp['count']=$count;
	
		
	

    
    		array_push($contact, $temp);
	}}
	echo json_encode($contact);

	
	
?>