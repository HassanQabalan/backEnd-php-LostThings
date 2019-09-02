<?php 

include("config.php");

$id = $_POST["ID"];
$Name = $_POST["Name"];

	mysqli_query($con,"insert into information (id,Name)values('$id','$Name')")or die(mysqli_error($con)); 
	
	//    تخزين في الداتا بيز

//========================================================================================================================	
	$contact=array();  //  جلب من السيرفر

    $stmt = $con->prepare("SELECT id,Name FROM  information ");

	$stmt->execute();
	
	$stmt->bind_result($id,$Name );

	while($stmt->fetch()){
	     	$temp = array();
	        $temp['id'] =$id; 
            $temp['Name']=$Name;
    //   نفس الاسماء الموجودة في الاندرويد   

    		array_push($contact, $temp);
	}
	echo json_encode($contact);

?>