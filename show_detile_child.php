<?php 
include("config.php");

$id_family=$_POST["id_family"];

$stmt = $con->prepare("SELECT id , name ,health_stutes ,class_study ,bearth_day ,gender , image FROM register_child  WHERE  id_family='$id_family'");
$contact = array();
$stmt->execute();
	$stmt->bind_result($id ,$name,$health_stutes,$class_study , $bearth_day ,$gender,$image );

	while($stmt->fetch()){
		$temp = array();
		
		$temp['id'] = $id; 
		$temp['name'] = $name; 
		$temp['health_stutes'] = $health_stutes;
		$temp['class_study'] = $class_study; 
		$temp['bearth_day'] = $bearth_day; 
		$temp['gender'] = $gender;
		$temp['image'] = $image;
		
    	array_push($contact, $temp);
	}
	echo json_encode($contact);

	

	
?>