<?php 
include("config.php");

$name = $_POST["name"];
$health_stutes = $_POST["health_stutes"];
$class_study = $_POST["class_study"];
$gender = $_POST["gender"];
$bearth_day = $_POST["bearth_day"];
$id_family = $_POST["id_family"];

$image = $_POST["image"];

$rand = rand(000000,999999);
 $image_url="$rand.$id_user";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));

mysqli_query($con,"insert into register_child (name,health_stutes,class_study,gender,bearth_day ,image ,id_family)values('$name','$health_stutes','$class_study','$gender','$bearth_day','$url',$id_family)")or die(mysqli_error($con));

$respons=array();

$respons['respons']="good_send_data";


  echo json_encode($respons);
 mysqli_close($con);

	
	

	
	
	
	
?>