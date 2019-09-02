<?php 
include("config.php");

$id_post=$_POST['id_post'];

 $contact = array();
 
$id_type = mysqli_query($con,"SELECT type FROM post WHERE id ='$id_post'");
$result=mysqli_fetch_array($id_type);
$id_type=$result['type'];
	
	
	if($id_type==11){
	//wallet
	$stmt = $con->prepare("SELECT image FROM wallet  WHERE id_post='$id_post' ");
	$stmt->execute();
	$stmt->bind_result($image );
		
	while($stmt->fetch()){
		$temp = array();
		$temp['image']=$image;
	
    	array_push($contact, $temp);
	}

}
else if ($id_type==1 || $id_type==4) {
    //mobile and others 
    $stmt = $con->prepare("SELECT image FROM others  WHERE id_post='$id_post' ");
	$stmt->execute();
	$stmt->bind_result($image );
		
	while($stmt->fetch()){
		$temp = array();
		$temp['image']=$image;
	
    	array_push($contact, $temp);
	}
 
}

else if ($id_type==10 ) {
    //jewalery
    $stmt = $con->prepare("SELECT image FROM jewelery  WHERE id_post='$id_post' ");
	$stmt->execute();
	$stmt->bind_result($image );
		
	while($stmt->fetch()){
		$temp = array();
		$temp['image']=$image;
	
    	array_push($contact, $temp);
	}
   
}


else if ($id_type==9 ) {
    //off_dec
    $stmt = $con->prepare("SELECT image FROM offical_doc  WHERE id_post='$id_post' ");
	$stmt->execute();
	$stmt->bind_result($image );
		
	while($stmt->fetch()){
		$temp = array();
		$temp['image']=$image;
	
    	array_push($contact, $temp);
	}
   
}
else if ($id_type==12 ) {
    
	$temp = array();
		$temp['image']="no_image";
	
    	array_push($contact, $temp);
	
}

	echo json_encode($contact);

	
	

	
	
	
	
?>