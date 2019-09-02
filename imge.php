<?php 
include("config.php");
$name = $_POST["name"];
 $image = $_POST["image"];
 
 $rand = rand(000000,999999);
 $image_url="$rand.$name";
  
  $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
  
    $insert= mysqli_query($con,"insert into imge (img_name,name) values ('$url','$image_url')") or die(mysqli_error($con));

$stmt = $con->prepare("SELECT img_name,name  FROM imge where id ='37' ");
	$stmt->execute();
	$stmt->bind_result($img_name,$name);
    $chats = array(); 
	while($stmt->fetch()){
		$temp = array();
		
		$temp['img_name'] = $img_name; 
    	$temp['name'] = $name; 
		array_push($chats, $temp);
	}
	echo json_encode($chats);

?>