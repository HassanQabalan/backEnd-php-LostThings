<?php
include("config.php");

  $supervisor_name = $_POST["supervisor_name"];
  $image = $_POST["image"];
  $identificaion_personal = $_POST["identificaion_personal"];
  $phone_number = $_POST["phone_number"];
   $child_num = $_POST["child_num"];
    $notes = $_POST["notes"];
     $name_build = $_POST["name_build"];
      $date_bearth_day_supervisor = $_POST["date_bearth_day_supervisor"];

$rand = rand(000000,999999);
 $image_url="$rand";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
 
  $sql=  mysqli_query($con,"insert into supervisor_information (supervisor_name,image,identificaion_personal,phone_number,child_num,notes,name_build,date_bearth_day_supervisor) values ('$supervisor_name','$url','$identificaion_personal','$phone_number','$child_num','$notes','$name_build','$date_bearth_day_supervisor')") or die(mysqli_error($con));   
  
  
	 
	$respons=array();

$respons['respons']="good_send_data";


  echo json_encode($respons);
 mysqli_close($con);
       
?>