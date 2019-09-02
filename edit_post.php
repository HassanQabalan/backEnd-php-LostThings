<?php
include("config.php");

  $text_post = $_POST["text_post"];
  $date ="";
  $image = $_POST["image_url"];
  $type = $_POST["type"];
  $country = $_POST["country"];

$rand = rand(000000,999999);
 $image_url="$rand";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
 
  $sql=  mysqli_query($con,"insert into news_hrs (text_post,date,image_url,country,type) values ('$text_post','$date', '$url','$country','$type')") or die(mysqli_error($con));   
  
  
	 
	$respons=array();

$respons['respons']="good_send_data";


  echo json_encode($respons);
 mysqli_close($con);
       
?>