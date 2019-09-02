<?php 
include("config.php");

$id_sp_home=$_POST["id_sp_home"];

// $id = mysqli_query($con,"SELECT id FROM build WHERE name='$name_sp_home' ");
// $result=mysqli_fetch_array($id);
// $id=$result['id'];



$contact = array();
$result = mysqli_query($con,"SELECT COUNT(*) AS `count` FROM `family`");
$row = mysqli_fetch_assoc($result);
$count = $row['count'];
//echo  $count;


$stmt = $con->prepare("SELECT id,name FROM  family WHERE id_home='$id_sp_home' ");

	$stmt->execute();
	
	$stmt->bind_result($x,$name );

	while($stmt->fetch()){
		$temp = array();
	$temp['id'] =$x; 
    
        $temp['name1']=$name;
	
$temp['count']=$count;
    
    		array_push($contact, $temp);
	}
	echo json_encode($contact);

	
	
?>