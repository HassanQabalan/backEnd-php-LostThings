<?php 
include("config.php");

$image = $_POST["image"];

$token = $_POST["token"];

// $id_users = mysqli_query($con,"SELECT id FROM user WHERE token='$token' ");
// $result=mysqli_fetch_array($id_users);
// $id_user=$result['id'];

$rand = rand(000000,999999);
 $image_url="$rand.$id_user";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
  
	mysqli_query($con,"UPDATE user SET image='$url' WHERE token='$token'")or die(mysqli_error($con));
 
 
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

	

	
	
	
	
?>